<?php

class IndexController extends ControllerBase
{

	public function initialize()
    {
        parent::initialize();
        $this->tag->setTitle($this->view->t->_('t_home'));
    }


    /**
     * Redirecciona al home de la aplicación
     */
    public function indexAction() {
        
    }


    public function payAction() {

        if ($this->request->isPost()){
            echo $this->request->get('quantity'); return;
        }

        echo "error"; return;
    }

}

