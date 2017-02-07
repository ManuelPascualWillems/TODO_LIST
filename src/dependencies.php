<?php
  $container = $app->getContainer();

  $container['view'] = function ($c){
    $settings = $c -> get ('settings')['render'];
    return new \Slim\Views\PhpRenderer($settings['template_path']);
  };

  $container['db'] = function ($c){
    $settings = $c -> get ('settings')['db'];
    $basedatos = new medoo($settings);
    return $basedatos;
  };

  $container['UserController'] = function ($c){
    return new \App\Controllers\UserController($c);
  };

  $container['ProductController'] = function ($c){
    return new \App\Controllers\ProductController($c);
  };

  $container['session'] = function ($c) {
  return new \SlimSession\Helper;
  };
