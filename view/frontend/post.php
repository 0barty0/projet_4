<?php
$title = $post['title'];

ob_start();
?>

<div class="row">
  <div class="panel panel-primary col-md-8 col-md-offset-2">
    <div class="panel-heading">
      <h1><?= $post['title'] ?></h1>
      <p><?= $post['creation_date_fr'] ?></p>
    </div>
    <div class="panel-body">
      <p> <?= nl2br($post['content']) ?></p>
    </div>
  </div>
</div>

<?php

$content = ob_get_clean();

require('template.php');
