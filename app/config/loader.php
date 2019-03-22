<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs([
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->pluginsDir,
        $config->application->formsDir
]);

$loader->registerNamespaces([
    'App\Controllers' => realpath(__DIR__ . '/../Controllers/'),
    'App\Models' => realpath(__DIR__ . '/../models/'),
    'Phalcon'      	  => realpath(__DIR__ . '/../../vendor/phalcon/incubator/Library/Phalcon/'),
    
]);


$loader->register();
