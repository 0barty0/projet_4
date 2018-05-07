<?php

$title = "Modération des commentaires";

ob_start();
?>
<div class="row">
  <div class="panel-group col-md-4 col-md-offset-2">
      <h2>Commentaires</h2>
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
        foreach ($comments as $comment) {
            ?>
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3><?= $comment->author() ?></h3>
                <p><?= $comment->comment_date_fr() ?></p>
              </div>
              <div class="panel-body">
                <p><?= nl2br($comment->comment()) ?></p>
                <form action="index.php?action=deleteComment&amp;id=<?= $comment->id() ?>" method="post" class="text-right">
                  <button type="submit" class="btn btn-warning">Supprimer</button>
                </form>
              </div>
            </div>
          <?php
        }
       ?>
  </div>
</div>
<?php
$content = ob_get_clean();

require('template.php');
