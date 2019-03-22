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
    public function registerOrder($data) {

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

}

