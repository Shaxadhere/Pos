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

/**
 * generates random string of given length
 *
 * @param Integer   $length_of_string  expects length of string in numbers
 * 
 * @return String random string with length of given length
 */ 
function generateProductCode () 
{
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	return substr(str_shuffle($str_result),0, 6); 
} 



?>