<?php

$title = "Modération des commentaires";

ob_start();

if (count($reportedComments) === 0 && count($nonReportedComments) === 0) {
    ?>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="alert alert-info" role="alert">
        <p>Il n'y a aucun commentaire.</p>
      </div>
    </div>
  </div>
  <?php
} else {
        $nbComments = count($reportedComments);
        if ($nbComments === 0) {
            ?>
            <div class="row">
              <div class="col-md-8 offset-md-2">
                <div class="alert alert-warning" role="alert">
                  <p>Il n'y a aucun commentaire signalé.</p>
                </div>
              </div>
            </div>
            <?php
        } else {
            ?>
                <div class="row">
                  <div class="col-md-8 offset-md-2">
                    <div class="card">
                      <h3 class="card-header bg-warning">
                              <?php
                                if ($nbComments === 1) {
                                    echo "1 commentaire signalé";
                                } else {
                                    echo $nbComments. " commentaires signalés";
                                } ?>
                            </h3>
                      <div class="card-body">
                        <?php
                          foreach ($reportedComments as $comment) {
                              ?>
                          <div class="card comment">
                            <div class="card-header bg-warning">
                              <h3><?= $comment->author() ?></h3>
                              <p><?= $comment->comment_date_fr() ?></p>
                            </div>
                            <div class="card-body">
                              <p>
                                <?= nl2br($comment->comment()) ?>
                              </p>
                            </div>
                            <div class="card-footer">
                                  <div class="row justify-content-between">
                                    <button type="button" class="btn btn-danger" data-toggle="popover" data-trigger="focus" title="Motif" data-content="<?= $comment->reporting() ?>" data-placement="right">Signalé <?= $comment->reported() ?> fois</button>
                                    <form action="index.php?action=deleteComment&amp;id=<?= $comment->id() ?>" method="post">
                                    <button type="submit" class="btn btn-warning">Supprimer</button>
                                    </form>
                                  </div>
                            </div>
                          </div>
                          <?php
                          } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
        } ?>
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <?php
            foreach ($nonReportedComments as $comment) {
                ?>
              <div class="card comment">
                <div class="card-header text-white bg-secondary">
                  <h3><?= $comment->author() ?></h3>
                  <p>
                    <?= $comment->comment_date_fr() ?>
                  </p>
                </div>
                <div class="card-body">
                  <p>
                    <?= nl2br($comment->comment()) ?>
                  </p>
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
      <?php
    }

$content = ob_get_clean();

require('template.php');
