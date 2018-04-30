<?php
$title="Connexion";

ob_start();
?>
  <div class="row">
    <form action="index.php?action=login" method="post" class="well col-md-4 col-md-offset-4">
      <legend>Accès à la zone administrative</legend>
      <div class="form-group">
        <label for="pseudo" class="">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Connection</button>
    </form>
  </div>
<?php
$content=ob_get_clean();

require('template.php');
