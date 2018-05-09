<?php
$title = $post->title();

ob_start();
?>
<div class="row">
  <div class="card col-lg-8 offset-lg-2">
    <div class="card-header text-white bg-primary">
      <h1><?= $post->title() ?></h1>
      <p><?= $post->creation_date() ?></p>
    </div>
    <div class="card-body">
      <?= $post->content() ?>
    </div>
  </div>
</div>

<?php
if (count($comments) === 0) {
    //Display alert
} else {
    ?>
  <div class="row">
    <div class="card col-md-4 offset-md-2">
        <h2 class="card-header text-white bg-primary">Commentaires</h2>
        <div class="card-body">
        <?php
          foreach ($comments as $comment) {
              ?>
              <div class="card">
                <div class="card-header text-white bg-primary">
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
<?php
}
 ?>

<div class="row">
  <div class="card col-md-4 offset-md-2">
    <h2 class="card-header text-white bg-primary">Ajouter un commentaire</h2>
    <div class="card-body">
      <form action="index.php?action=addComment&amp;id=<?= $post->id() ?>" method="post" class="form-horizontal">
        <div class="form-group">
          <label for="author" class="control-label col-sm-4">Auteur :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="author" id="author">
          </div>
        </div>

        <div class="form-group">
          <label for="comment" class="control-label col-sm-4">Commentaire :</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="comment" id="comment" cols="30" rows="10"></textarea>
          </div>
        </div>

        <div class="text-right">
          <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php

$content = ob_get_clean();

require('template.php');
