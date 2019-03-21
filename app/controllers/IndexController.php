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

}

