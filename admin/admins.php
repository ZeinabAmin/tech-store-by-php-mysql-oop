<?php require_once("inc/header.php"); ?>

<?php

use TechStore\Classes\Models\Admin;

$adminObject = new Admin();

$admins = $adminObject->selectAll("admins.id AS adminId, admins.name AS adminName, `email`,`is_super`, admins.created_at AS adminCreatedAt");

?>

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <?php require_once (APATH."/inc/success.php"); ?>
      <h4 class="card-title">Striped Table</h4>
      <?php if ($session->has('is_super') && $session->get('is_super') == 'yes' ) { ?>
      <a href="<?= AURL . "/add-admin.php" ?>" class="btn btn-success"> <i class=" icon-plus"></i> Add admin</a>
      <?php } ?>
      <table class="table table-striped text-center">
        <thead>
          <tr>
            <th> #ID </th>
            <th> Name </th>
            <th> email </th>
            <th> is_super </th>
            <th> Created At </th>
            <th> Actions </th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($admins as $index => $admin) : ?>

            <tr>
              <td><?= $index + 1 ?></td>
              <td> <?= $admin['adminName'] ?> </td>
              <td> <?= $admin['email'] ?> </td>
              <td> <?= $admin['is_super'] ?> </td>
              <td> <?= date("d M,Y h:i a", strtotime($admin['adminCreatedAt'])); ?> </td>
              <?php if ($session->has('is_super') && $session->get('is_super') == 'yes' ) { ?>
              <td><a href="<?= AURL . "/handlers/delete-admin.php?id=" . $admin['adminId'] ?>" class="btn btn-danger btn-sm"><i class="icon-trash icon-md"></i></a> </td>
              <?php } ?>
            </tr>

          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>



<?php require_once("inc/footer.php"); ?>