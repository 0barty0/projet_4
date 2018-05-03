<?php

$title = "Nouvel article";

ob_start();
?>
<div class="row">
  <form action="index.php?action=addPost" method="post" class="col-md-8 col-md-offset-2 well">
    <legend>Nouvel article</legend>
    <div class="form-group">
      <input class="form-control" type="text" name="title" id="title" placeholder="Titre">
    </div>
    <div class="form-group">
      <textarea name="content" id="content"></textarea>
    </div>
    <div class="text-right">
      <button type="submit" class="btn btn-primary">Publier</button>
    </div>
  </form>
</div>

<script src="public/js/tinymce/tinymce.min.js"></script>
<script src="public/js/tinymce/jquery.tinymce.min.js"></script>
<script>tinymce.init({ selector:'#content' });</script>
<?php

$content=ob_get_clean();

require('template.php');
