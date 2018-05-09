<?php
$title = "Accueil";

ob_start();
?>
  <div class="row">
    <h1 class="col-lg-8 offset-lg-2">Un billet pour l'Alaska</h1>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <img src="public/images/alaska_mountains.jpg" alt="Montagne d'Alaska" id="home_image">
    </div>
  </div>

<?php
$content = ob_get_clean();

require('template.php');
