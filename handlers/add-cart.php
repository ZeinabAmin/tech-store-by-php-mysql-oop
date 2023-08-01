<?php
use TechStore\Classes\Cart;

require_once("../app.php");

// if ($request->postHas('submit)) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $cartObject = new Cart;

  $id     = $request->post('id');
  $name   = $request->post('name');
  $price  = $request->post('price');
  $img    = $request->post('img');
  $qty    = $request->post('pty');

  $data = [
    'id'    => $id,
    'name'  => $name,
    'price' => $price,
    'img'   => $img,
    'qty'   => $qty,
  ];

  $cartObject->add($id,$data);

  $request->redirect("index.php");

} else {
  $request->redirect("index.php");
}


