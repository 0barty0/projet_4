<?php

$title = "Modification d'article";

if (isset($_SESSION['articleTitle'])) {
    $articleTitle = $_SESSION['articleTitle'];
    unset($_SESSION['articleTitle']);
} else {
    $articleTitle = $post->title();
}

if (isset($_SESSION['articleContent'])) {
    $articleContent = $_SESSION['articleContent'];
    unset($_SESSION['articleContent']);
} else {
    $articleContent = $post->content();
}

ob_start();
?>
<div class="row">
  <form action="index.php?action=update&id=<?= $post->id() ?>" method="post" class="col-md-8 col-md-offset-2 well">
    <legend>Modification d'article</legend>
    <div class="form-group">
      <input class="form-control" type="text" name="title" id="title" placeholder="Titre" value="<?= $articleTitle ?>">
    </div>
    <div class="form-group">
      <textarea name="content" id="content"><?= $articleContent ?></textarea>
    </div>
    <div class="text-right">
      <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
  </form>
</div>

<script>tinymce.init({ selector:'#content' });</script>
<?php

$content=ob_get_clean();

require('template.php');
