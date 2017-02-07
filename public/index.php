<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

session_start();

error_reporting(E_ALL ^ E_WARNING);

require __DIR__.'/../vendor/autoload.php';

$settings=require __DIR__.'/../src/settings.php';

$app = new \Slim\App($settings);

$app->add(new \Slim\Middleware\Session());

require __DIR__.'/../src/dependencies.php';
require __DIR__.'/../src/routes.php';


$app->run();
