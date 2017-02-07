<?php
namespace App\Controllers;
use App\Model\products;

class ProductController extends BaseController{

  public function products($request,$response)
  {
    if (isset($_SESSION['name'])){
      $products = new Products($this->container);
      $all = $products->select('*');

      return $this->view->render($response, 'list-productos.phtml', compact('all'));
    }
    else{
      return $this->response->withStatus(200)->withHeader('Location', '/');
    }
  }

  public function new_product($request,$response)
  {
    if (isset($_SESSION['name'])){
      $products = new Products($this->container);
      $postParams = $request->getParsedBody();
      $counter=$products->select('count(*)');
      $inserccion = $products->insert(["id"=>$counter,
                                "nombre" => $postParams["name"],
                                "descripcion" => $postParams["description"],
                                "unidades" => $postParams["units"],
                                "precio" => $postParams["price"]]);
      return $this->response->withStatus(200)->withHeader('Location', 'list');
    }
    else{
      return $this->response->withStatus(200)->withHeader('Location', '/');
    }
  }

  public function delete_product($request,$response)
  {
    if (isset($_SESSION['name'])){
      $product_del = new Products($this->container);
      $product_del->delete(["id" => $_GET["id"]]);
      return $this->response->withStatus(200)->withHeader('Location', 'list');
    }
    else{
      return $this->response->withStatus(200)->withHeader('Location', '/');
    }
  }

  public function update($request,$response)
  {
    if (isset($_SESSION['name'])){
      $product_up = new Products($this->container);
      $all = $product_up->select('*',["id" => $_GET["id"]]);
      return $this->view->render($response, 'update-product.phtml', compact('all'));
    }
    else{
      return $this->response->withStatus(200)->withHeader('Location', '/');
    }
  }

  public function update_product($request,$response)
  {
    if (isset($_SESSION['name'])){
      $product_up = new Products($this->container);
      $product_up->update(["nombre"=>$_POST["name"],
                           "descripcion"=>$_POST["description"],
                           "unidades"=>$_POST["units"],
                           "precio"=>$_POST["price"]],
                           ["id" => $_POST["id"]]);
       return $this->response->withStatus(200)->withHeader('Location', 'list');
     }
     else{
       return $this->response->withStatus(200)->withHeader('Location', '/');
     }
  }
}
