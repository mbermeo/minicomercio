<?php
use Phalcon\Mvc\View;

class SessionController extends ControllerBase
{

    protected $curl;

	public function initialize()
    {
        parent::initialize();
    }

    public function indexAction(){
        if($this->session->get('auth')){
            $this->response->redirect('order/list');
        }else{
            
        }
    }


    /**
     * Autenticaci'on de usuario
     * Funci'on que autentica un usuario en la aplicaci'on 
     *
     */
    public function startAction()
    {
        if ($this->request->isPost()) {

            $username = $this->request->get('username');
            $password = $this->request->get('password');
          
            //Por ahora valido usuario y clave por defecto
            if($username == 'admin' && $password == 'tpagatest') {
                $this->session->set('auth', array(
                    'id' => uniqid(),
                    'name' => 'admin'
                ));  
            }
        }

        return $this->dispatcher->forward(array(
            'controller' => "session",
            'action' => 'index'
        ));
    }



    /**
     * Finalizar sesi'on
     * Encargada de finalizar la sesi'on del usuario autenticado 
     *
     */
    public function  endAction()
    {
        $this->session->destroy();
        $this->response->redirect('');
    }

}

