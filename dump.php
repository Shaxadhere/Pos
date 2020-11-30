<?php

include_once('config.php');

// echo generateProductCode(6);

$productCode = generateProductCode();
$productCode = "ABCD12";

    if(checkExistance("tbl_product", "ProductCode", $productCode, connect())){
        showAlert("Value Exists");
    }

?>