<?php


require_once "../../app.php";

use TechStore\Classes\Validation\Validator;
use TechStore\Classes\Models\Product;
use TechStore\Classes\File;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $id         = $request->post('id');
  $name       = $request->post('name');
  $category   = $request->post('category');
  $price      = $request->post('price');
  $pieces     = $request->post('pieces');
  $desc       = $request->post('desc');
  $img        = $request->files('img');

  // validation
  $validator = new Validator();
  $validator->validate("Name", $name, ["Required", "Str", "Max"]);
  $validator->validate("Category", $category, ["Required", "Numeric"]);
  $validator->validate("Price", $price, ["Required", "Numeric"]);
  $validator->validate("pieces Number", $pieces, ["Required", "Numeric"]);
  $validator->validate("Description", $desc, ["Required", "Str"]);

  if ($img['error'] == 0) {
    $validator->validate("Image", $img, ["Image"]);
  }

  if ($validator->hasErrors()) {
    $session->set("errors", $validator->getErrors());
    $request->aredirect("edit-product.php");
  } else {

    $productObject = new Product;

    $imgName = $productObject->selectId($id, 'img')['img'];

    if ($img['error'] == 0) {
      unlink(PATH. "uploads/$imgName");
      // unlink("../../uploads/$imgName");
      $fileObject = new File($img);
      $imgName = $fileObject->rename()->upload();
    }

    $productObject->update("`name` = '$name', `desc` = '$desc', `price` = '$price', `pieces_no` = '$pieces', `img` = '$imgName', `cat_id` = '$category'", "'$id'");

    $session->set("success", "Product Edit SeccessFliy");
    $request->aredirect("product.php");
  }
} else {
  $request->aredirect("edit-product.php");
}

