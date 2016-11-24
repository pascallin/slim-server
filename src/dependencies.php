<?php 
$container = $app->getContainer();

$container['logger'] = function($container) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

$container['view'] = new \Slim\Views\PhpRenderer("../templates/");

$container['db'] =  function($container){
    return new medoo($container['settings']['db']);
};