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


    public function payAction() {

        if ($this->request->isPost()){

            $expiresAt = strtotime ( '+1 day' , strtotime ( date('Y-m-d H:i:s') ) ) ;
            $expiresAt = date ( 'c' , $expiresAt );

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
            
            $dataCreate = $this->curl->curlApiGeneric('payment_requests/create',json_encode($params), 'post');
            
            if(isset($dataCreate['tpaga_payment_url'])) {
                header('Location: '.$dataCreate['tpaga_payment_url']);
            }
            else{
                $this->view->error = isset($dataCreate['error_message'])?$dataCreate['error_message']:
                    "error no identificado";
                $this->view->render('index','index');
                return;
            }
        }

        $this->view->error = "Funcionalidad solo disponible por post";
        $this->view->render('index','index');
        return;
    }


    public function thanksAction() {
        $this->view->render('index','thanks');
    }

}

