<?php

$_ROOT = $_SERVER['HTTP_HOST']."/pos";
$_HTMLROOTURI = "/pos";

// default database connection method
function connect(){
    define("server", "localhost");
    define("usr","root");
    define("pas","");
    define("data","db_pos");
    $connection = mysqli_connect(server, usr, pas, data) or die("failed to connect to database");
    return ($connection);
}

include_once('assets/phprapid/rapid.php');



?>