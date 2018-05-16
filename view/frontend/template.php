<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Un billet pour l'alaska, roman de Jean Forteroche">
    <meta name="keywords" content="Jean Forteroche,alaska,roman,blog">
    <meta name="author" content="Jean Forteroche">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Limelight" rel="stylesheet">
    <BASE href="http://localhost/Public/projet_4/">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $title ?></title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
      <li class="nav-item"><a href="listPosts/" class="nav-link">Liste des chapîtres</a></li>
    </ul>
  </div>
</nav>

<section id="main">
<?= $content ?>
 </section>
<footer>
  <div class="row justify-content-around">
    <div class="col-sm-4" id="social">
        <h4>Partagez ce blog</h4>
        <div id="social_btn">
          <a href="#"><i class="fab fa-2x fa-facebook-square"></i></a>
          <a href="#"><i class="fab fa-2x fa-twitter-square"></i></a>
          <a href="#"><i class="fab fa-2x fa-google-plus-square"></i></a>
        </div>
    </div>
    <div class="col-sm-4">
      <h4><a href="login/">Connexion</a></h4>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 text-center">
      <p id="copyright"><i class="far fa-copyright"></i> Jean Forteroche 2018</p>
    </div>
  </div>
</footer>
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="public/js/main.js"></script>
  </body>
</html>
