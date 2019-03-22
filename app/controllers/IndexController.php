<?php


class IndexController extends ControllerBase
{

	public function initialize()
    {
        parent::initialize();
        $this->curl = new CurlApi;
        $this->tag->setTitle($this->view->t->_('t_home'));
    }


    /**
     * Redirecciona al home de la aplicación
     */
    public function indexAction() {
        $this->view->error = "";
    }


    /**
     * Organiza info de pago y consume servicio de creación de solicitud de pago Tpaga
     * @access public
     */
    public function payAction() {

        if ($this->request->isPost()){

            $expiresAt = strtotime ( '+1 day' , strtotime ( date('Y-m-d H:i:s') ) ) ;
            $expiresAt = date ( 'c' , $expiresAt );

            //Organiza la data para enviar a Tpaga
            $params = [
                "cost" => 2000*$this->request->get('quantity'),
                "purchase_details_url" => $this->config->params->urlReturn,
                "idempotency_token" => uniqid(),
                "order_id" => 001,
                "terminal_id" => "sede_principal",
                "purchase_description" => $this->view->t->_("purchase_description"),
                "purchase_items" => [
                    [
                        "name" => $this->view->t->_("service_description"),
                        "value" => 2000*$this->request->get('quantity'),
                        "quantity" => $this->request->get('quantity'),
                    ]
                ],
                "user_ip_address" => $this->request->getServerAddress(),
                "expires_at" => $expiresAt
            ];
            
            //Consume servicio
            $dataCreate = $this->curl->curlApiGeneric('payment_requests/create',json_encode($params), 'post');

            //Si la solicitud de pago es exitosa
            if(isset($dataCreate['tpaga_payment_url'])) {

                //Almacena la info de la orden en BD
                $orderController = new OrderController();
                $orderController->registerOrderAction($dataCreate);
                header('Location: '.$dataCreate['tpaga_payment_url']);
            }
            else{
                //Solicitus errada: devuelve al index y muestra un error
                $this->view->error = isset($dataCreate['error_message'])?$dataCreate['error_message']:
                    "error no identificado";
                $this->view->render('index','index');
                return;
            }
        }

        //Si la funci'on de pago es consumida por post
        $this->view->error = "Funcionalidad solo disponible por post";
        $this->view->render('index','index');
        return;
    }


    /**
     * P]agina de gracias a donce se redirige el usuario despues del pago
     * @access public
     */
    public function thanksAction() {
        $this->view->render('index','thanks');
    }

}

