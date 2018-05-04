<?php
$title="Admnistration";

ob_start();
?>
<h1>Hello boss !</h1>
<?php
if (isset($_SESSION['message'])) {
    $message= $_SESSION['message'];
    unset($_SESSION['message']); ?>
  <div class="row">
    <div class="alert alert-success col-md-8 col-md-offset-2">
      <p>
        <?= $message ?>
      </p>
    </div>
  </div>
  <?php
}
?>
<?php
$content=ob_get_clean();

require('template.php');
