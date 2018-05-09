<?php
$title="Admnistration";

ob_start();
?>
<h1>Bienvenue <?= $_SESSION['pseudo'] ?> !</h1>
<?php
$content=ob_get_clean();

require('template.php');
