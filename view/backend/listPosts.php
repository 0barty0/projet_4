<?php
$title = "Liste des chapîtres";

ob_start();
?>
  <section id="list_posts">
    <?php
if (count($posts) === 0) {
    ?>
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="alert alert-info" role="alert">
            <p>Il n'y a aucun article.</p>
          </div>
        </div>
      </div>
      <?php
} else {
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
                <p><?= $except ?></p>
              </div>
              <div class="card-footer text-right">
                <a href="modify/<?= $post->id() ?>" class="btn btn-primary">Modifier</a>
                <a href="index.php?action=deletePost&amp;id=<?= $post->id() ?>" class="btn btn-warning" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');">Supprimer</a>
              </div>
            </div>
          </div>
        </article>

        <?php
        }
    }
?>
  </section>
  <?php
$content = ob_get_clean();

require('template.php');
