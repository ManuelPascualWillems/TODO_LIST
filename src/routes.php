<?php
$app->get('/', function($request,$response,$args){
  return $this->view->render($response,'index.phtml',$args);
});

$app->get('/new', function ($request,$response,$args) {
    return $this->view->render($response,'register.phtml',$args);
});

$app->get('/new_prod', function ($request,$response,$args) {
    return $this->view->render($response,'new-product.phtml',$args);
});

$app->get('/logout', function ($request,$response,$args) {
    $session= new \SlimSession\Helper;
    $session::destroy();
    return $this->view->render($response,'index.phtml',$args);
});
$app->post('/register','UserController:new_user')->setName('insert-user');
$app->post('/auth','UserController:login')->setName('auth');

$app->get('/list','ProductController:products')->setName('product-list');
$app->get('/delete','ProductController:delete_product')->setName('product-del');
$app->post('/update','ProductController:update_product')->setName('product-update');
$app->get('/to-update','ProductController:update')->setName('product-update-form');
$app->post('/new_product','ProductController:new_product')->setName('product-update-form');
