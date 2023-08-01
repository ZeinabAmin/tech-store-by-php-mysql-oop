<?php require_once("inc/header.php"); ?>

<?php

use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetail;

if ($request->getHas("id") && is_numeric($request->get("id"))) {
  $id = $request->get("id");
} else {
  $id  = 1;
}

$orderObject = new Order;
$ordersDetailsObject = new OrderDetail;

$order = $orderObject->selectIdWithOrder($id, "orders.*, SUM(qty * price) AS total");
$ordersDetails = $ordersDetailsObject->selectAllProduct($id);

?>


<div class="row justify-content-center">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Show Order : <?= $order['id'] ?></h4>
        <?php require_once (APATH."/inc/success.php"); ?>

        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered">
                <tbody>
                  <th colspan="2" class="text-center">Customer</th>
                  <tr>
                    <th> Name </th>
                    <td> <?= $order['name'] ?> </td>
                  </tr>
                  <tr>
                    <th> Email </th>
                    <td> <?= $order['email'] ?? "...." ?> </td>
                  </tr>
                  <tr>
                    <th> Phone </th>
                    <td> <?= $order['phone'] ?> </td>
                  </tr>
                  <tr>
                    <th> Address </th>
                    <td> <?= $order['address'] ?? "...." ?> </td>
                  </tr>
                  <tr>
                    <th> Time </th>
                    <td> <?= date("d M,Y h:i a", strtotime($order['created_at'])); ?> </td>
                  </tr>
                  <tr>
                    <th> Status </th>
                    <td> <?= $order['status'] ?> </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th> Product name </th>
                    <th> Quantity </th>
                    <th> Price </th>
                  </tr>
                  <?php foreach ($ordersDetails as $ordersDetail) : ?>
                    <tr>
                      <td> <?= $ordersDetail['name'] ?? "...." ?> </td>
                      <td> <?= $ordersDetail['qty'] ?? "...." ?> </td>
                      <td> <?= $ordersDetail['price'] ?? "...." ?> </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th>Total</th>
                  <?php if ($order['status'] === "pending") :  ?>
                    <th>Change Status</th>
                  <?php endif; ?>
                </tr>
                <tbody>
                  <tr>
                    <td>$ <?= $order['total'] ?> </td>
                    <?php if ($order['status'] === "pending") :  ?>
                      <td>
                        <a href="<?= AURL . "/handlers/handle-approved.php?id=" . $order['id'] ?>" class="btn btn-success btn-sm">Approve</a>
                        <a href="<?= AURL . "/handlers/handle-cancel.php?id=" . $order['id'] ?>" class="btn btn-danger btn-sm">Cancel</a>
                      </td>
                    <?php endif; ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <a href="<?= AURL . "/orders.php" ?>" class="btn btn-dark btn-md">Back</a>

      </div>
    </div>
  </div>
</div>
<?php require_once("inc/footer.php"); ?>