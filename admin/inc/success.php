<?php if ($session->has("success")) : ?>
  <div class="md-0 alert alert-success text-center" style="width: fit-content;">
    <?= $session->get("success") ?>
    <?php $session->remove("success"); ?>
  </div>
<?php endif; ?>