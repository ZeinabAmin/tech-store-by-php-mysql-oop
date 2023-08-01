<?php require_once("inc/header.php"); ?>

<?php

use TechStore\Classes\Models\Product;

$productObject = new Product();

$products = $productObject->selectAllWithCats("products.id AS prodId, products.name AS prodName, cats.name AS catsName, price, pieces_no, img, products.created_at AS prodCreatedAt");

?>

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <?php require_once (APATH."/inc/success.php"); ?>
      <h4 class="card-title">Striped Table</h4>
      <a href="<?= AURL . "/add-product.php" ?>" class="btn btn-success"> <i class=" icon-plus"></i> Add Product</a>
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th> #ID </th>
            <th> Name </th>
            <th> Category </th>
            <th> Image </th>
            <th> Pieces </th>
            <th> Price </th>
            <th> Created At </th>
            <th> Actions </th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($products as $index => $product) : ?>

            <tr>
              <td><?= $index + 1 ?></td>
              <td> <?= $product['prodName'] ?> </td>
              <td> <?= $product['catsName'] ?> </td>
              <td class="py-1">
                <img src="<?= URL . "uploads/" . $product['img'] ?>" alt="image">
              </td>
              <td> <?= $product['pieces_no'] ?> </td>
              <td> <?= $product['price'] ?> </td>
              <td> <?= date("d M,Y h:i a", strtotime($product['prodCreatedAt'])); ?> </td>
              <td> <a href="<?= AURL . "/edit-product.php?id=" . $product['prodId'] ?>" class="btn btn-primary btn-sm"><i class="icon-note icon-md"></i></a>
               <a href="<?= AURL . "/handlers/delete-product.php?id=" . $product['prodId'] ?>" class="btn btn-danger btn-sm"><i class="icon-trash icon-md"></i></a> </td>
            </tr>

          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>



<?php require_once("inc/footer.php"); ?>