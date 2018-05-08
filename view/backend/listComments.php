<?php

$title = "Modération des commentaires";

ob_start();

if (count($comments) === 0) {
    ?>
    <div class="row">
      <div class="alert alert-info col-md-8 offset-md-2" role="alert">
        <p>Il n'y a aucun commentaire signalé.</p>
      </div>
    </div>
    <?php
} else {
        ?>
          <h2>Commentaires signalés</h2>
        <?php
          foreach ($comments as $comment) {
              ?>
          <div class="row">
            <div class="col-md-4 offset-md-2">
              <div class="card">
                <div class="card-header">
                  <h3><?= $comment->author() ?></h3>
                  <p><?= $comment->comment_date_fr() ?></p>
                </div>
                <div class="card-body">
                  <p><?= nl2br($comment->comment()) ?></p>
                  <form action="index.php?action=deleteComment&amp;id=<?= $comment->id() ?>" method="post">
                    <button type="submit" class="btn btn-warning">Supprimer</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
                  <?php
          }
    }
$content = ob_get_clean();

require('template.php');
