<?php require_once("inc/header.php"); ?>

<?php

use TechStore\Classes\Models\Order;

$ordersObject = new Order;
$orders = $ordersObject->selectAllWithOrder("orders.id, orders.name, orders.phone, orders.status, orders.created_at, SUM(qty * price) AS total");

?>

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Striped Table</h4>
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th> #ID </th>
            <th> Name </th>
            <th> Phone </th>
            <th> Total </th>
            <th> Status </th>
            <th> Created At </th>
            <th> Actions </th>
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
              <td> <a href="<?= AURL . "/order.php?id=" . $orders['id'] ?>" class="btn btn-primary btn-sm"><i class="icon-note icon-md"></i></a> </td>
            </tr>

          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>



<?php require_once("inc/footer.php"); ?>