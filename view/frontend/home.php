<?php
$title = "Un billet pour l'Alaska";

ob_start();
?>
  <div class="row">
    <div class="col-lg-12">
      <div id="home">
        <img src="public/images/alaska_mountains.jpg" alt="Montagne d'Alaska" id="home_image">
        <div id="home_title">
          <h1 class="display-3">Un billet pour l'Alaska</h1>
          <h2 class="text-right">Le nouveau livre de Jean Forteroche</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div id="presentation">
        <p>L'écrivain et acteur Jean Forteroche vous propose de découvrir son dernier roman au fil de sa création.</p>
        <p>Il le publiera sur son blog chapître après chapître.</p>
      </div>
    </div>
  </div>

<?php
$content = ob_get_clean();

require('template.php');
