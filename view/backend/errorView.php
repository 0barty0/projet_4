<?php

$title = "Erreur";

ob_start();
?>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
          <h2 class="card-header text-white bg-danger">Erreur</h2>
        <div class="card-body">
          <p><?= $errorMessage ?></p>
          <div class="text-right">
            <button class="btn btn-danger" onclick="document.location.href=document.referrer">Retour</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
$content = ob_get_clean();

require('template.php');
