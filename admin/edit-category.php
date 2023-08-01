<?php require_once("inc/header.php"); ?>

<?php

use TechStore\Classes\Models\Cat;

$catObject = new Cat;

if ($request->getHas("id") && is_numeric($request->get("id"))) {
  $id = $request->get("id");
} else {
  $id  = 1;
}

$cats = $catObject->selectId($id, "id,name");

?>


<div class="row justify-content-center">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Category : <?= $cats['name'] ?></h4>

        <?php require_once (APATH."/inc/errors.php"); ?>
        <?php require_once (APATH."/inc/success.php"); ?>

        <form action="<?= AURL . "/handlers/handle-edit-category.php" ?>" method="POST" class="forms-sample" enctype="multipart/form-data">

          <input type="hidden" name="id" value="<?= $id ?>">
          <div class="form-group">
            <label for="exampleInputUsername1">Name Product</label>
            <input type="text" name="name" value="<?= $cats['name'] ?>" class="form-control" id="exampleInputUsername1" placeholder="Name Product">
          </div>
          <input type="hidden" name="id" value="<?= $cats['id'] ?>">
          <button type=" submit" class="btn btn-primary mr-2">Submit</button>
          <a href="<?= AURL . "/index.php" ?>" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require_once("inc/footer.php"); ?>