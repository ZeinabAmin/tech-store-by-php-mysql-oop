<?php
use TechStore\Classes\Cart;

require_once "../app.php";

if ($request->getHas('id')) {

  $cartObject = new Cart;

  $id = $request->get('id');
  $cartObject->remove($id);

  $request->redirect("cart.php");
} else {
  $request->redirect("index.php");
}


