<?php
$title = $post->title();

ob_start();
 ?>
<h1 class="display-4" id="main_title">Un billet pour l'Alaska</h1>
<?php
if (isset($_SESSION['message'])) {
     $message= $_SESSION['message'];
     unset($_SESSION['message']); ?>
  <div class="row" id="message">
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
      <div class="col-md-8 offset-md-2">
        <div class="alert alert-success">
          <p>
            Aucun commentaire.
          </p>
        </div>
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
                  <div class="card-footer text-right">
                      <button type="button" class="btn btn-warning report" data-toggle="modal" data-target="#reportComment" data-comment="<?= $comment->id()?>">Signaler</button>
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

<div class="modal fade" id="reportComment" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title">Signaler un commentaire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" id="reportForm">
      <div class="modal-body">
        <div class="form-group">
          <label for="reporting">Motif du signalement :</label>
          <select class="form-control" name="reporting">
            <option value="Message sans rapport avec le contenu">Message sans rapport avec le contenu</option>
            <option value="Non respect du droit d'auteur">Non respect du droit d'auteur</option>
            <option value="Incitation à la haine raciale">Incitation à la haine raciale</option>
            <option value="Propos à caractère homophobe ou sexiste">Propos à caractère homophobe ou sexiste</option>
            <option value="Diffamation ou injure">Diffamation ou injure</option>
          </select>
          <input type="hidden" name="postId" value="<?= $post->id() ?>">
        </div>
      </div>
      <div class="modal-footer text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-warning">Signaler</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php

$content = ob_get_clean();

require('template.php');
