<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
  <link rel="stylesheet" href="public/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Lato|Limelight" rel="stylesheet">
  <script src="public/js/tinymce/tinymce.min.js"></script>
  <script src="public/js/tinymce/jquery.tinymce.min.js"></script>
  <title>
    <?= $title ?>
  </title>
</head>

<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg sticky-top">
      <a href="#" class="navbar-brand">
      <img src="public/images/logo.png" alt="iceberg" width="50" height="50"></a>
      <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Accueil</a></li>
          <li class="nav-item"><a href="index.php?action=createPost" class="nav-link">Écrire un article</a></li>
          <li class="nav-item"><a href="index.php?action=listPosts" class="nav-link">Gestion des articles</a></li>
          <li class="nav-item"><a href="index.php?action=listComments" class="nav-link">Modération des commentaires</a></li>
          <li class="nav-item"><a href="index.php?action=deconnexion" class="nav-link">Déconnexion</a></li>
        </ul>
      </div>
    </nav>

    <section id="main">
      <h1 class="display-4" id="main_title">Un billet pour l'Alaska</h1>
    <?php
    if (isset($_SESSION['message'])) {
        $message= $_SESSION['message'];
        unset($_SESSION['message']); ?>
      <div class="row" id="message">
        <div class="col-md-8 offset-md-2">
          <div class="alert alert-success ">
            <p>
              <?= $message ?>
            </p>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
      <?= $content ?>
    </section>
  </div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="public/js/main.js"></script>
</body>

</html>
