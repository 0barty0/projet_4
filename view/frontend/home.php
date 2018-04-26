<?php
$title = "Homepage";

ob_start();
?>
<h1>Bienvenue !</h1>
<?php
$content = ob_get_clean();

require('template.php');
