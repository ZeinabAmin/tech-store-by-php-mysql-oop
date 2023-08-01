<?php require_once("inc/header.php"); ?>

<div class="row justify-content-center">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">New Category</h4>

        <?php require_once "inc/errors.php" ?>
        <?php require_once (APATH."/inc/success.php"); ?>

        <form action="<?= AURL . "/handlers/handle-add-category.php" ?>" method="POST" class="forms-sample" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputUsername1">Name Category</label>
            <input type="text" name="name_category" class="form-control" id="exampleInputUsername1" placeholder="Name Category">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="<?= AURL . "/index.php" ?>" class="btn btn-light">Cancel</a>
        </form>

      </div>
    </div>
  </div>
</div>
<?php require_once("inc/footer.php"); ?>