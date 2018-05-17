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
                                    <button type="button" class="btn btn-primary reply" data-toggle="modal" data-target="#replyComment" data-comment="<?= $comment->id()?>" data-post="<?= $comment->post_id() ?>">Répondre</button>
                                    <a href="index.php?action=deleteComment&amp;id=<?= $comment->id() ?>" class="btn btn-warning" onclick="return confirm('Voulez-vous vraiment supprimer ce commentaire ?');">Supprimer</a>
                                  </div>
                            </div>
                            <?php
                          if ($comment->reply_author() !== null) {
                              ?>
                                <div class="card comment reply">
                                  <div class="card-header text-white bg-info">
                                    <h3>Réponse de <?= $comment->reply_author() ?></h3>
                                    <p><?= $comment->reply_date_fr() ?></p>
                                  </div>
                                  <div class="card-body">
                                    <p><?= nl2br($comment->reply()) ?></p>
                                  </div>
                                </div>
                                <?php
                          } ?>
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
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-primary reply" data-toggle="modal" data-target="#replyComment" data-comment="<?= $comment->id()?>" data-post="<?= $comment->post_id() ?>">Répondre</button>
                    <a href="index.php?action=deleteComment&amp;id=<?= $comment->id() ?>" class="btn btn-warning" onclick="return confirm('Voulez-vous vraiment supprimer ce commentaire ?');">Supprimer</a>
                </div>
                <?php
              if ($comment->reply_author() !== null) {
                  ?>
                    <div class="card comment reply">
                      <div class="card-header text-white bg-info">
                        <h3>Réponse de <?= $comment->reply_author() ?></h3>
                        <p><?= $comment->reply_date_fr() ?></p>
                      </div>
                      <div class="card-body">
                        <p><?= nl2br($comment->reply()) ?></p>
                      </div>
                    </div>
                    <?php
              } ?>
              </div>
            <?php
            } ?>
          </div>
        </div>

        <div class="modal fade" id="replyComment" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h5 class="modal-title">Répondre au commentaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" method="post" id="replyForm">
              <div class="modal-body">
                <div class="form-group row">
                  <label for="reply" class="col-form-label col-md-3">Votre réponse :</label>
                    <div class="col-md-9">
                      <textarea class="form-control" name="reply" id="reply" cols="30" rows="5" required></textarea>
                    </div>
                </div>
              </div>
              <div class="modal-footer text-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Répondre</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      <?php
    }

$content = ob_get_clean();

require('template.php');
