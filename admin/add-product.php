<?php require_once("inc/header.php"); ?>

<?php

use TechStore\Classes\Models\Cat;

$catObject = new Cat;
$cats = $catObject->selectAll("id,name");
?>


<div class="row justify-content-center">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">New Product</h4>
        <?php require_once (APATH."/inc/errors.php"); ?>
        <?php require_once (APATH."/inc/success.php"); ?>
        <form action="<?= AURL . "/handlers/handle-add-product.php" ?>" method="POST" class="forms-sample" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputUsername1">Name Product</label>
            <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Name Product">
          </div>
          <div class="form-group">
            <label for="exampleInputSselect">Category</label>
            <select class="form-control" name="category" id="exampleInputSselect">
              <?php foreach ($cats as $value) : ?>
                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputprice">price</label>
            <input type="text" name="price" class="form-control" id="exampleInputprice" placeholder="price">
          </div>
          <div class="form-group">
            <label for="exampleInputPieces">Pieces</label>
            <input type="text" name="pieces" class="form-control" id="exampleInputPieces" placeholder="Pieces">
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">description</label>
            <textarea class="form-control" name="desc" id="exampleTextarea1" rows="4" spellcheck="false"></textarea>
          </div>
          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" name="img" class="custom-file-input" id="inputGroupFile02">
              <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="<?=  AURL . "/index.php" ?>" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require_once("inc/footer.php"); ?>