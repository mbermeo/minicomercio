<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

	protected $_avalaibleLangs = array("es","en");

	protected function initialize()
    {
        $this->tag->prependTitle('Minicomercio | ');
        $this->view->setTemplateAfter('main');
        $this->getTranslation();
    }

	/**
	* @desc - Diccionario de traducciones del proyecto
	*/
	public function getTranslation() {
		//obtenemos el archivo con las traducciones
		require "../app/messages/es.php";

		//devolvemos el objeto con las traducciones del idioma escogido
		$translate = new Phalcon\Translate\Adapter\NativeArray(array(
			"content" => $messages
		));

		//establece la variable $t disponible en todas las vistas
		$this->view->t = $translate;
	}

}
