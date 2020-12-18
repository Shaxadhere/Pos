<?php

include_once('config.php');
include_once('Models/PosModel.php');

echo (fetchDataLike(
    "tbl_product",
    array(
        "ProductName",
        "IP",
        "ProductCode",
        "dasda"
    ),
    5,
    connect()
));

?>
