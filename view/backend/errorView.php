<?php

$title = "Erreur";

ob_start();
?>
  <div class="row">
    <div class="panel panel-danger col-md-8 col-md-offset-2">
      <div class="panel-heading">
        <h2>Erreur</h2>
      </div>
      <div class="panel-body">
        <p><?= $errorMessage ?></p>
        <div class="text-right">
          <button class="btn btn-danger" onclick="document.location.href=document.referrer">Retour</button>
        </div>
      </div>
    </div>
  </div>
<?php
$content = ob_get_clean();

require('template.php');
