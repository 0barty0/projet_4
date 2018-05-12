<?php
$title = $post->title();

ob_start();
 ?>
<h1 class="display-4" id="main_title">Un billet pour l'Alaska</h1>
<?php
if (isset($_SESSION['message'])) {
     $message= $_SESSION['message'];
     unset($_SESSION['message']); ?>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="alert alert-success ">
        <p>
          <?= $message ?>
        </p>
      </div>
    </div>
  </div>
  <?php
 }
 ?>
<div class="row">
  <div class="col-lg-8 offset-lg-2">
    <div class="card">
      <div class="card-header text-white bg-primary">
        <h1><?= $post->title() ?></h1>
        <p><?= $post->creation_date() ?></p>
      </div>
      <div class="card-body">
        <?= $post->content() ?>
      </div>
    </div>
  </div>
</div>

<?php
$nbComments = count($comments);
if ($nbComments === 0) {
    ?>
    <div class="row">
      <div class="alert alert-success col-md-8 offset-md-2">
        <p>
          Aucun commentaire.
        </p>
      </div>
    </div>
    <?php
} else {
        ?>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
          <h3 class="card-header text-white bg-secondary">
            <?php
              if ($nbComments === 1) {
                  echo "1 commentaire";
              } else {
                  echo $nbComments. " commentaires";
              } ?>
          </h3>
          <div class="card-body">
          <?php
            foreach ($comments as $comment) {
                ?>
                <div class="card comment">
                  <div class="card-header text-white bg-secondary">
                    <h3><?= $comment->author() ?></h3>
                    <p><?= $comment->comment_date_fr() ?></p>
                  </div>
                  <div class="card-body">
                    <p><?= nl2br($comment->comment()) ?></p>
                  </div>
                  <div class="card-footer">
                    <form action="index.php?action=reportComment&amp;id=<?= $comment->id() ?>&amp;idPost=<?= $post->id() ?>" method="post" class="text-right">
                      <button type="submit" class="btn btn-warning">Signaler</button>
                    </form>
                  </div>
                </div>
              <?php
            } ?>
           </div>
      </div>
    </div>
  </div>
<?php
    }
 ?>

<div class="row">
  <div class="col-md-8 offset-md-2">
    <div class="card">
      <h3 class="card-header text-white bg-primary">Ajouter un commentaire</h3>
      <div class="card-body">
        <form action="index.php?action=addComment&amp;id=<?= $post->id() ?>" method="post">
          <div class="form-group row">
            <label for="author" class="col-form-label col-md-3">Auteur :</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="author" id="author" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="comment" class="col-form-label col-md-3">Commentaire :</label>
              <div class="col-md-9">
                <textarea class="form-control" name="comment" id="comment" cols="30" rows="5" required></textarea>
              </div>
          </div>

          <div class="text-right">
            <button type="submit" class="btn btn-primary">Envoyer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

$content = ob_get_clean();

require('template.php');
