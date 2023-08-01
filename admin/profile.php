<?php require_once("inc/header.php"); ?>
<div class="row justify-content-center">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Default form</h4>
        <p class="card-description"> Basic form layout </p>

        <?php require_once "inc/errors.php" ?>

        <form action="<?= AURL . "/handlers/handle-profile.php" ?>" method="POST" class="forms-sample">
          <div class="form-group">
            <label for="exampleInputUsername1">Username</label>
            <input type="text" name="name" class="form-control" value="<?= $session->get("adminName"); ?>" id="exampleInputUsername1" placeholder="Username">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" value="<?= $session->get("adminEmail"); ?>" id="exampleInputEmail1" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Confirm Password">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="<?= AURL . "/index.php" ?>" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require_once("inc/footer.php"); ?>