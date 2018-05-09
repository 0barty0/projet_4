<?php
$title = "Accueil";

ob_start();
?>
  <div class="row" id="home">
    <div class="col-lg-12">
      <img src="public/images/alaska_mountains.jpg" alt="Montagne d'Alaska" id="home_image">
      <div id="title">
        <h1 class="display-2">Un billet pour l'Alaska</h1>
        <h2 class="text-right">Le nouveau livre de Jean Forteroche</h2>
      </div>
    </div>
  </div>

<?php
$content = ob_get_clean();

require('template.php');
