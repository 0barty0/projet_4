<?php

$title = "Nouvel article";

if (isset($_SESSION['articleTitle'])) {
    $articleTitle = $_SESSION['articleTitle'];
    unset($_SESSION['articleTitle']);
} else {
    $articleTitle = '';
}

if (isset($_SESSION['articleContent'])) {
    $articleContent = $_SESSION['articleContent'];
    unset($_SESSION['articleContent']);
} else {
    $articleContent = '';
}

ob_start();
?>
<div class="row">
  <div class="col-lg-8 offset-lg-2">
    <div class="card">
      <h2 class="card-header text-white bg-primary">Nouvel article</h2>
      <div class="card-body">
        <form action="index.php?action=addPost" method="post">
          <div class="form-group">
            <input class="form-control" type="text" name="title" id="title" placeholder="Titre" value="<?= $articleTitle ?>" required>
          </div>
          <div class="form-group">
            <textarea name="content" id="content"><?= $articleContent ?></textarea>
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">Publier</button>
          </div>
        </form>
      </div>
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
