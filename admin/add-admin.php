<?php require_once("inc/header.php"); ?>

<?php 
if (!$session->has('is_super') && $session->get('is_super') == 'yes' ) {
  $request->aredirect("admins.php");
}
?>
<div class="row justify-content-center">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">New admin</h4>
        <?php require_once (APATH."/inc/errors.php"); ?>
        <?php require_once (APATH."/inc/success.php"); ?>
        <form action="<?= AURL . "/handlers/handle-add-admin.php" ?>" method="POST" class="forms-sample" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputUsername1">Name admin</label>
            <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Name admin">
          </div>
          <div class="form-group">
            <label for="exampleInputemail">email</label>
            <input type="text" name="email" class="form-control" id="exampleInputemail" placeholder="email">
          </div>
          <div class="form-group">
            <label for="exampleInputpassword">password</label>
            <input type="password" name="password" class="form-control" id="exampleInputpassword" placeholder="password">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="<?=  AURL . "/index.php" ?>" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require_once("inc/footer.php"); ?>