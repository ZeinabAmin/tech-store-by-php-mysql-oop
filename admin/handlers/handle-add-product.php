<?php

require_once "../../app.php";

use TechStore\Classes\Validation\Validator;
use TechStore\Classes\Models\Product;
use TechStore\Classes\File;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name       = $request->post('name');
  $category   = $request->post('category');
  $price      = $request->post('price');
  $pieces     = $request->post('pieces');
  $desc       = $request->post('desc');
  $img       = $request->files('img');

  // validation
  $validator = new Validator();
  $validator->validate("Name", $name, ["Required", "Str", "Max"]);
  $validator->validate("Category", $category, ["Required", "Numeric"]);
  $validator->validate("Price", $price, ["Required", "Numeric"]);
  $validator->validate("pieces Number", $pieces, ["Required", "Numeric"]);
  $validator->validate("Description", $desc, ["Required", "Str"]);
  $validator->validate("Image", $img, ["Required", "Image"]);


  if ($validator->hasErrors()) {
    $session->set("errors", $validator->getErrors());
    $request->aredirect("add-product.php");
  } else {

    $fileObject = new File($img);
    $imgName = $fileObject->rename()->upload();
    $productObject = new Product;

    $productObject->insert("`name`, `desc`, `price`, `pieces_no`, `img`, `cat_id`", "'$name', '$desc', '$price', '$pieces', '$imgName', '$category'");

    $session->set("success", "Product added SeccessFliy");
    $request->aredirect("product.php");
  }
} else {

  $request->aredirect("add-product.php");
}


