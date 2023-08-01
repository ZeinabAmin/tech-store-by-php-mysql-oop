<?php require_once("inc/header.php"); ?>

<?php

use TechStore\Classes\Models\Cat;

$catObject = new Cat();

$categorys = $catObject->selectAll();

?>

<div class="row justify-content-center">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Show Category</h4>
        <?php require_once (APATH."/inc/success.php"); ?>
        <table class="table table-hover text-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Time</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($categorys as $index => $category) : ?>

              <tr>
                <td><?= $index + 1 ?></td>
                <td> <?= $category['name'] ?> </td>
                <td> <?= date("d M,Y h:i a", strtotime($category['created_at'])); ?> </td>
                <td> <a href="<?= AURL . "/edit-category.php?id=" . $category['id'] ?>" class="btn btn-primary btn-sm"><i class="icon-note icon-md"></i></a> <a href="<?= URL . "admin/handlers/delete-category.php?id=" . $category['id'] ?>" class="btn btn-danger btn-sm"><i class="icon-trash icon-md"></i></a></td>
              </tr>

            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require_once("inc/footer.php"); ?>