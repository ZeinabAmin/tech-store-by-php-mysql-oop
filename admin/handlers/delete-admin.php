<?php

use TechStore\Classes\Models\Admin;

require_once "../../app.php";

if ($request->getHas("id")) {

  $id = $request->get("id");

  $adminObject = new Admin;
  $adminObject->delete($id);

  $session->set("success", "admin deleted SeccessFliy");
  $request->aredirect("admins.php");
}

