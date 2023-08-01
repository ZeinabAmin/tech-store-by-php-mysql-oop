<?php require_once("inc/header.php"); ?>

<?php

use TechStore\Classes\Models\Cat;
use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\Product;

$productObject = new Product();
$orderObject = new Order();
$catObject = new Cat();

$products = $productObject->selectAllWithCats("products.id AS prodId, products.name AS prodName, cats.name AS catsName, price, pieces_no, img, products.created_at AS prodCreatedAt");
$orders = $orderObject->selectAllWithOrder("orders.id, orders.name, orders.phone, orders.status, orders.created_at, SUM(qty * price) AS total");

$productCount = $productObject->getCount();
$orderCount = $orderObject->getCount();
$catCount = $catObject->getCount();

?>

<!-- Quick Action Toolbar Starts-->
<!-- <div class="row quick-action-toolbar">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-header d-block d-md-flex">
        <h5 class="mb-0">Quick Actions</h5>
        <p class="ml-auto mb-0">How are your active users trending overtime?<i class="icon-bulb"></i></p>
      </div>
      <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
          <button type="button" class="btn px-0"> <i class="icon-user mr-2"></i> Add Client</button>
        </div>
        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
          <button type="button" class="btn px-0"><i class="icon-docs mr-2"></i> Create Quote</button>
        </div>
        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
          <button type="button" class="btn px-0"><i class="icon-folder mr-2"></i> Enter Payment</button>
        </div>
        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
          <button type="button" class="btn px-0"><i class="icon-book-open mr-2"></i>Create Invoice</button>
        </div>
      </div>
    </div>
  </div>
</div> -->

<!-- Quick Action Toolbar Ends-->
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">

        <div class="row">
          <div class="col-md-12">
            <div class="d-sm-flex align-items-baseline report-summary-header">
              <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <a href="<?= AURL . "index.php" ?>" class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></a>
            </div>
          </div>
        </div>

        <div class="row report-inner-cards-wrapper">
          <div class=" col-md -6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">ORDERS</span>
              <h4><?= $orderCount ?></h4>
              <!-- <span class="report-count"> 2 Reports</span> -->
            </div>
            <div class="inner-card-icon bg-success" style="border-radius: 10px;">
              <i class="icon-basket"></i>
            </div>
          </div>
          <div class="col-md-6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">PRODUCTS</span>
              <h4><?= $productCount  ?></h4>
              <!-- <span class="report-count"> 3 Reports</span> -->
            </div>
            <div class="inner-card-icon bg-danger" style="border-radius: 10px;">
              <i class="icon-briefcase"></i>
            </div>
          </div>
          <div class="col-md-6 col-xl report-inner-card">
            <div class="inner-card-text">
              <span class="report-title">CATEGORYS</span>
              <h4><?= $catCount  ?></h4>
              <!-- <span class="report-count"> 5 Reports</span> -->
            </div>
            <div class="inner-card-icon bg-info" style="border-radius: 10px;">
              <i class="icon-rocket"></i>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="row">

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-sm-flex align-items-center mb-4">
          <h4 class="card-title mb-sm-0">Products Inventory</h4>
          <a href="<?= AURL . "/product.php" ?>" class="text-dark ml-auto mb-3 mb-sm-0"> View all Products</a>
        </div>
        <div class="table-responsive border rounded p-1">
          <table class="table">
            <thead>
              <tr>
                <th class="font-weight-bold"> #ID </th>
                <th class="font-weight-bold"> Name </th>
                <th class="font-weight-bold"> Category </th>
                <th class="font-weight-bold"> Image </th>
                <th class="font-weight-bold"> Pieces </th>
                <th class="font-weight-bold"> Price </th>
                <th class="font-weight-bold"> Created At </th>
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
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-sm-flex align-items-center mb-4">
          <h4 class="card-title mb-sm-0">Products Inventory</h4>
          <a href="<?= AURL . "/orders.php" ?>" class="text-dark ml-auto mb-3 mb-sm-0"> View all Orders</a>
        </div>
        <div class="table-responsive border rounded p-1">
          <table class="table">
            <thead>
              <tr>
                <th class="font-weight-bold"> #ID </th>
                <th class="font-weight-bold"> Name </th>
                <th class="font-weight-bold"> Phone </th>
                <th class="font-weight-bold"> Total </th>
                <th class="font-weight-bold"> Status </th>
                <th class="font-weight-bold"> Created At </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($orders as $index => $orders) : ?>

                <tr>
                  <td><?= $index + 1 ?></td>
                  <td> <?= $orders['name'] ?> </td>
                  <td> <?= $orders['phone'] ?> </td>
                  <td> <?= $orders['total'] ?> </td>
                  <td><label class="badge badge-<?php if ($orders['status'] == "approved") {
                                                  echo "success";
                                                } elseif ($orders['status'] == "pending") {
                                                  echo "warning";
                                                } else {
                                                  echo "danger";
                                                } ?>"><?= $orders['status'] ?></label></td>
                  <td> <?= date("d M,Y h:i a", strtotime($orders['created_at'])); ?> </td>
                </tr>
                <?php if ($index == 10) {
                  break;
                } ?>

              <?php endforeach; ?>


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once("inc/footer.php"); ?>