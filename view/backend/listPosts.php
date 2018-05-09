<?php
$title = "Liste des chapîtres";

ob_start();
if (count($posts) === 0) {
    ?>
  <div class="row">
    <div class="alert alert-info col-md-8 offset-md-2" role="alert">
      <p>Il n'y a aucun articles.</p>
    </div>
  </div>
  <?php
} else {
        foreach ($posts as $post) {
            $content = strip_tags($post->content());
            if (preg_match('/^.{1,250}\b/su', $content, $match)) {
                $except = $match[0];
            } ?>

          <div class="row">
            <div class="col-md-8 offset-md-2">
              <div class="card">
                  <h2 class="card-header text-white bg-primary"><?= $post->title() ?></h2>
                <div class="card-body">
                  <?= $except ?>
                </div>
                <div class="card-footer">
                  <a href="?action=modify&amp;id=<?= $post->id() ?>" class="btn btn-primary">Modifier</a>
                  <a href="?action=deletePost&amp;id=<?= $post->id() ?>" class="btn btn-warning">Supprimer</a>
                </div>
              </div>
            </div>
          </div>

    <?php
        }
    }

$content = ob_get_clean();

require('template.php');
