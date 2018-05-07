<?php
$title="Admnistration";

ob_start();
?>
<h1>Hello boss !</h1>
<?php
$content=ob_get_clean();

require('template.php');
