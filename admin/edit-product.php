<?php require_once("inc/header.php"); ?>

<?php

use TechStore\Classes\Models\Cat;
use TechStore\Classes\Models\Product;

$productObject = new Product;
$catObject = new Cat;

if ($request->getHas("id")) {
  $id = $request->get("id");
} else {
  $id  = 1;
}

$products = $productObject->selectId($id, "products.name AS prodName, cats.name AS catsName, `price`, `pieces_no`, `img`, `desc`, cat_id");
$cats = $catObject->selectAll("id,name");

?>


<div class="row justify-content-center">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Product : <?= $products['prodName'] ?></h4>
        <!-- <p class="card-description"> Basic form layout </p> -->

        <?php require_once (APATH."/inc/errors.php"); ?>
        <?php require_once (APATH."/inc/success.php"); ?>

        <form action="<?= AURL . "/handlers/handle-edit-product.php" ?>" method="POST" class="forms-sample" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-group">
            <label for="exampleInputUsername1">Name Product</label>
            <input type="text" name="name" value="<?= $products['prodName'] ?>" class="form-control" id="exampleInputUsername1" placeholder="Name Product">
          </div>
          <div class="form-group">
            <label for="exampleInputSselect">Category</label>
            <select class="form-control" name="category" id="exampleInputSselect">
              <?php foreach ($cats as $value) : ?>
                <option value="<?= $value['id'] ?>" <?php if ($value['id'] == $products['cat_id']) { echo 'selected'; } ?> ><?= $value['name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputprice">price</label>
            <input type="text" name="price" value="<?= $products['price'] ?>" class="form-control" id="exampleInputprice" placeholder="price">
          </div>
          <div class="form-group">
            <label for="exampleInputPieces">Pieces</label>
            <input type="text" name="pieces" value="<?= $products['pieces_no'] ?>" class=" form-control" id="exampleInputPieces" placeholder="Pieces">
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">description</label>
            <textarea class="form-control" name="desc" id="exampleTextarea1" rows="4" spellcheck="false"><?= $products['desc'] ?></textarea>
          </div>
          <div class="input-group mb-3">
            <div class="mb-3 d-flex justify-content-center">
            <img src="<?=  URL . "uploads/" . $products['img']; ?>" height="100px" alt="">
            </div>
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