<?php

use TechStore\Classes\Models\Product;

require_once "../../app.php";

if ($request->getHas("id")) {

  $id = $request->get("id");

  $productObject = new Product;
  $imgName = $productObject->selectId($id,"img")["img"];

  // unlink("../../uploads/$imgName");
  unlink(PATH ."uploads/$imgName");
  $productObject->delete($id);

  $session->set("success", "Product deleted SeccessFliy");
  $request->aredirect("product.php");
}

