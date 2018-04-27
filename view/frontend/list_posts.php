<?php
$title = "Liste des chapîtres";

ob_start();
?>
<h1>Le fameux livre</h1>
<?php
  while ($post=$posts->fetch()) {
      $content = $post['content'];
      if (preg_match('/^.{1,250}\b/su', $content, $match)) {
          $except = $match[0];
      } ?>
      <div class="row">
        <div class="panel-group col-md-8 col-md-offset-2">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2><?= $post['title'] ?></h2>
            </div>
            <div class="panel-body">
              <p><?= nl2br($except) ?> ...</p>
              <div class="text-right">
                <a href="?action=post&amp;id=<?= $post['id'] ?>" class="btn btn-primary">Lire la suite</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php
  }
$posts->closeCursor();

$content = ob_get_clean();

require('template.php');
