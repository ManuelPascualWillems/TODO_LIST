<?php
namespace App\Controllers;
use App\Model\Users;

class UserController extends BaseController{

  public function login($request,$response)
  {
    $users = new Users($this->container);
    $postParams = $request->getParsedBody();
    $all = $users->select('*',["AND" => ["password" => $postParams["password"],
                  "nombre" => $postParams["user"]]]);
    if ($all)
    {
      $session= new \SlimSession\Helper;
      $session->set('name', $postParams["user"]);
      return $this->response->withStatus(200)->withHeader('Location', 'list');
    }
    else
    {
      return $this->response->withStatus(200)->withHeader('Location', '/');
    }

  }

  public function new_user($request,$response)
  {
    $user_ins = new Users($this->container);
    $postParams = $request->getParsedBody();
    $contador=$user_ins->select('count(*)');
    $inserccion = $user_ins->insert(["id"=>$contador,
                              "nombre" => $postParams["user"],
                              "password" => $postParams["password"],
                              "email" => $postParams["email"]]);
    return $this->response->withStatus(200)->withHeader('Location', '/');
  }
}
