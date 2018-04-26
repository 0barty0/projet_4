<?php
$title = "Liste des chapîtres";

ob_start();
?>
<h1>Le fameux livre</h1>
<?php
  while ($post=$req->fetch()) {
      ?>
      <div class="row">
        <div class="panel-group col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><?= $post['title'] ?></h2>
            </div>
            <div class="panel-body">
              <p><?= $post['content'] ?></p>
            </div>
          </div>
        </div>
      </div>

    <?php
  }
$req->closeCursor();

$content = ob_get_clean();

require('template.php');
