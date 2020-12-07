<?php

$_ROOT = $_SERVER['HTTP_HOST']."/Pos";
$_HTMLROOTURI = "/Pos";

// default database connection method
function connect(){
    $server = "localhost";
    $usr = "root";
    $pass = "";
    $data = "db_pos";
    $connection = mysqli_connect($server, $usr, $pass, $data) or die("failed to connect to database");
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