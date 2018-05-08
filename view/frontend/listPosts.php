<?php
$title = "Liste des chapîtres";

ob_start();

if (count($posts) === 0) {
    ?>
<div class="row">
  <div class="alert alert-info col-md-8 col-md-offset-2" role="alert">
    <p>Il n'y a aucun articles.</p>
  </div>
</div>
<?php
} else {
        ?>
      <h1>Le fameux livre</h1>
      <?php
      foreach ($posts as $post) {
          $content = $post->content();
          if (preg_match('/^.{1,250}\b/su', $content, $match)) {
              $except = $match[0];
          } ?>
      <div class="row justify-content-center">
        <div class="card-group col-md-8">
          <div class="card card-primary">
              <h2 class="card-header"><?= $post->title() ?></h2>
            <div class="card-body">
              <?= $except ?>
              <div class="text-right">
                <a href="?action=post&amp;id=<?= $post->id() ?>" class="btn btn-primary">Lire la suite</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php
      }
    }

$content = ob_get_clean();

require('template.php');
