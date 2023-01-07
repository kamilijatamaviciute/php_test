<?php

use Oop\Exam\Container\DIContainer;
use Oop\Exam\Framework\Router;

require_once './vendor/autoload.php';

// Load custom DI container
$container = new DIContainer();
$container->loadDependencies();

// Use custom Router
//echo '<pre>';
//die(print_r($_SERVER['REQUEST_URI']));
$requestUri = str_replace('/PHP_test/' , '',$_SERVER['REQUEST_URI']);


$router = $container->get(Router::class);
$router->process($requestUri);