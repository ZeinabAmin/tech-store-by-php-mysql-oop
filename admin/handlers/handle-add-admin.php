<?php


require_once "../../app.php";

use TechStore\Classes\Validation\Validator;
use TechStore\Classes\Models\Admin;

if ($session->has('is_super') == 'yes') {
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name       = $request->post('name');
  $email   = $request->post('email');
  $password   = $request->post('password');

  // validation
  $validator = new Validator();
  $validator->validate("Name", $name, ["Required", "Str", "Max"]);
  $validator->validate("email", $email, ["Required", "Email"]);
  $validator->validate("password", $password, ["Required", "Str", "Max"]);


  if ($validator->hasErrors()) {
    $session->set("errors", $validator->getErrors());
    $request->aredirect("add-admin.php");
  } else {

    $adminObject = new Admin;
    $passwordHash = password_hash($password, PASSWORD_BCRYPT); // or PASSWORD_DEFAULT
    $adminObject->insert("`name`, `email`,`password`", "'$name', '$email','$passwordHash'");

    $session->set("success", "admin added SeccessFliy");
    $request->aredirect("admins.php");
  }
} else {

  $request->aredirect("add-admin.php");
}
}else{
    $request->aredirect("admins.php");
}


