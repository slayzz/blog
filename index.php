<?php
include "lib/db.php";
include "lib/base.php";

/*define('ROOT', dirname(__FILE__));*/



$new = new app(substr($_SERVER['REQUEST_URI'], 2));


?>

