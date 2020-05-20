<?php

use SlimRestful\RestAppFactory;
use SlimRestful\SettingsManager;

require_once __DIR__ . '/../vendor/autoload.php';

//Load settings
$settingsManager = SettingsManager::getInstance();
$settingsManager->load(__DIR__ . '/../config/config.ini');

//Get container
$container = $settingsManager->getContainer();

//Instanciate app
RestAppFactory::setContainer($container);
$app = RestAppFactory::create();

//Load middlewares and routes
$app->addSlimMiddlewares()
    ->loadRoutes(__DIR__ . '/../src/routes/routes.json');

//Run app
$app->run();
