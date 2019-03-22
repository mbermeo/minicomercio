<?php

use Phalcon\Mvc\User\Plugin;
use Phalcon\Http\Client\Request;

class CurlApi  extends Plugin {


    /**
     * Funci'on para consumir cualquier endpoint del API de Tpaga
     * 
     * @access public
     *
     * @param string $url complemento de la URL del endpoint a consumir
     * @param string $params Par'ametros que se env'ian al endpoint
     * @param string $method M'etodo de consumo
     *
     * @return $responseData Arreglo con la info de respuesta de Tpaga
     * 
     */
    public function curlApiGeneric($url, $params, $method = 'get'){

        $provider = Request::getProvider();
        $provider->header->set('Authorization', 'Basic bWluaWFwcC1nYXRvMTptaW5pYXBwbWEtMTIz');
        $provider->header->set('Cache-Control', 'no-cache');
        $provider->header->set('Content-Type', 'application/json');

        $provider->setBaseUri($this->config->params->urlTpaga);
        $response = $provider->$method($url,$params);
        $responseData = json_decode($response->body, true);

        return $responseData;
    }

}