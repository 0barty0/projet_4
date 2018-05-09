<?php
$title = "Liste des chapîtres";

ob_start();
?>
  <section id="list_posts">
    <?php
if (count($posts) === 0) {
    ?>
      <div class="row">
        <div class="alert alert-info col-md-8 offset-md-2" role="alert">
          <p>Il n'y a aucun articles.</p>
        </div>
      </div>
      <?php
} else {
        ?>
        <h1 class="display-3">Un billet pour l'Alaska</h1>
        <?php
      foreach ($posts as $post) {
          $content = strip_tags($post->content());
          if (preg_match('/^.{1,250}\b/su', $content, $match)) {
              $except = $match[0];
          } ?>
          <article class="row">
            <div class="col-lg-8 offset-lg-2">
              <div class="card">
                <h2 class="card-header text-white bg-primary"><?= $post->title() ?></h2>
                <div class="card-body">
                  <?= $except ?>
                </div>
                <div class="card-footer text-right">
                  <a href="?action=post&amp;id=<?= $post->id() ?>" class="btn btn-primary">Lire la suite</a>
                </div>
              </div>
            </div>
          </article>

          <?php
      }
    }
?>
            <section>
              <?php
$content = ob_get_clean();

require('template.php');
