<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
  <title>Document</title>
</head>
<body>
  <div class="row">
    <form action="index.php?action=admin" method="post" class="well col-md-4 col-md-offset-4">
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
</body>
</html>
