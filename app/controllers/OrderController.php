<?php

use App\Models\Orders;

class OrderController extends ControllerBase
{

	public function initialize()
    {
        parent::initialize();
        $this->curl = new CurlApi;
    }

    /**
     * Almacena la info de la orden en BD para realizar seguimiento
     *
     * @param Array $data Informaci'on de la orden
     * @access public
     */
    public function registerOrderAction($data) {

        $order = new Orders();
        $order->idempotency_token = $data['idempotency_token'];
        $order->order_id = $data['order_id'];
        $order->terminal_id = $data['terminal_id'];
        $order->purchase_description = $data['purchase_description'];
        $order->token = $data['token'];
        $order->status = $data['status'];
        $order->expires_at = $data['expires_at'];

        if (!$order->save()) {
            $this->view->error = $order->getMessages()[0]->getMessage();
            $this->view->render('index','index');
            exit;
        }
    }


    /**
     * Valida estado de ordenes en TPaga para almacenar cambios
     *
     * @access public
     */    
    public function validateStatusAction() {
        $orders = Orders::find([
            "conditions" => "status = :status:",
            "bind" => ['status' => 'created']
        ]);

        foreach($orders as $value) {
            //Consume servicio
            $dataValidate = $this->curl->curlApiGeneric('payment_requests/'.$value->token."/info", [] , 'get');
            
            if(isset($dataValidate['status']) && $dataValidate['status'] != 'created') {
                $value->status = $dataValidate['status'];
                $value->save();
            }
        }
    }


    /**
     * Lista todas las ordenes registradas para realizar seguimiento
     *
     * @access public
     */    
    public function listAction () {
        $orders = Orders::find();
        $this->view->data = $orders->toArray();
        $this->view->render('orders','list');
    }


    public function revertAction ($token) {
        $payRevert = $this->curl->curlApiGeneric('payment_requests/refund', 
            json_encode(['payment_request_token' => $token]) , 'post');

        if($payRevert['status'] == 'reverted') {
            $order = Orders::findFirstByToken($token);
            $order->status = 'reverted';
            $order->save();
        }


        $this->dispatcher->forward(array(
            'controller' => 'order',
            'action'     => 'list'
        ));
    }

}

