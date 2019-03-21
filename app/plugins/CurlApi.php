<?php

use Phalcon\Mvc\User\Plugin;
use Phalcon\Http\Client\Request;

class CurlApi  extends Plugin {

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