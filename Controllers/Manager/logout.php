<?php
include_once('../../config.php');
session_start();
session_unset();
session_destroy();
echo redirectWindow("$_HTMLROOTURI/Auth/");
?>