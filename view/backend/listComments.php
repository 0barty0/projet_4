<?php

$title = "Modération des commentaires";

ob_start();

if (count($comments) === 0) {
    ?>
    <div class="row">
      <div class="alert alert-info col-md-8 col-md-offset-2" role="alert">
        <p>Il n'y a aucun commentaire signalé.</p>
      </div>
    </div>
    <?php
} else {
        ?>
        <div class="row">
          <div class="panel-group col-md-4 col-md-offset-2">
              <h2>Commentaires signalés</h2>
              <?php
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
                } ?>
          </div>
        </div>
        <?php
    }
$content = ob_get_clean();

require('template.php');
