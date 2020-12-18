<?php

include_once('../../config.php');

$Prices = $_REQUEST['Prices'];
$totalPrice = 0;

$PricesArray = explode(",", $Prices);

foreach ($PricesArray as $price) {
    $totalPrice = $totalPrice + intval($price);
}

$gst = round(0.17 * $totalPrice);
$totalBill = $totalPrice + $gst;

$result = array(
    $totalPrice,
    $totalBill,
    $gst
);
echo json_encode($result);


?>