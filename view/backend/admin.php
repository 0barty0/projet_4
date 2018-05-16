<?php
$title="Admnistration";

ob_start();
$nbPosts=count($posts);
$nbComments=count($reportedComments);
?>
<div class="row">
  <div class="col-lg-8 offset-lg-2">
    <div class="card">
      <h1 class="card-header text-white bg-primary text-center">Bienvenue <?= $_SESSION['firstname'] ?> <?= $_SESSION['name'] ?></h1>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 text-center">
            <?php
            if ($nbPosts === 0) {
                ?>
              <div class="alert alert-info" role="alert">
                <p>Il n'y a aucun article.</p>
              </div>
              <?php
            } else {
                $aText = ($nbPosts === 1)?"1 article":$nbPosts." articles"; ?>
                <p>
                  <a href="listPosts/" class="btn btn-lg btn-success"><?= $aText ?></a>
                </p>
              <?php
            }
             ?>
             <p>
               <a href="createPost/" class="btn btn-lg btn-primary">Écrire un article</a>
             </p>
          </div>
          <div class="col-md-6 text-center">
            <?php
            if ($nbComments === 0) {
                ?>
              <div class="alert alert-info" role="alert">
                <p>Il n'y a aucun commentaire signalé.</p>
              </div>
              <?php
            } else {
                $aText = ($nbComments === 1)?"1 commentaire signalé":$nbComments." commentaires signalés"; ?>
                <p>
                  <a href="listComments/" class="btn btn-lg btn-warning"><?= $aText ?></a>
                </p>
              <?php
            }
             ?>
             <p>
               <a href="listComments/" class="btn btn-lg btn-danger">Modérer les commentaires</a>
             </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$content=ob_get_clean();

require('template.php');
