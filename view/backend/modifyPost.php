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
  <div class="card col-lg-8 offset-lg-2">
    <h2 class="card-header text-white bg-primary">Modification d'article</h2>
    <div class="card-body">
      <form action="index.php?action=update&amp;id=<?= $post->id() ?>" method="post">
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
  </div>
</div>

<script>
  tinymce.init({
    selector:'textarea#content',
    min_height:250,
    plugins:'lists,image',
    language:'fr_FR' });
</script>
<?php

$content=ob_get_clean();

require('template.php');
