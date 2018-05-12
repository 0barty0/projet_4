<?php
$title="Admnistration";

ob_start();
?>
<h1>Bienvenue <?= $_SESSION['firstname'] ?> <?= $_SESSION['name'] ?> !</h1>
<?php
$content=ob_get_clean();

require('template.php');
