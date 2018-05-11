<?php

$title = "Modération des commentaires";

ob_start();
$nbComments = count($comments);
if ($nbComments === 0) {
    ?>
    <div class="row">
      <div class="alert alert-info col-md-8 offset-md-2" role="alert">
        <p>Il n'y a aucun commentaire signalé.</p>
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
                        echo "1 commentaire signalé";
                    } else {
                        echo $nbComments. " commentaires signalés";
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
                          <form action="index.php?action=deleteComment&amp;id=<?= $comment->id() ?>" method="post" class="text-right">
                            <button type="submit" class="btn btn-warning">Supprimer</button>
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
$content = ob_get_clean();

require('template.php');
