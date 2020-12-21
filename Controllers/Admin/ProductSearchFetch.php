<?php

include_once('../../config.php');
include_once('../../Models/Admin/ProductsModel.php');

$id = $_REQUEST['uuid'];
$Prices = $_REQUEST['Prices'];

$model = new ProductModel();
$results = $model->View($id);
$product = mysqli_fetch_array($results);
$totalPrice = 0;

$PricesArray = explode(",", $Prices);

foreach ($PricesArray as $price) {
    $totalPrice = $totalPrice + intval($price);
}

$totalPrice = $totalPrice + intval($product['Price']);

$gst = round(0.17 * $totalPrice);
$totalBill = $totalPrice + $gst;

$row = "<li class='list-group-item d-flex align-items-center'>".
"<div class='row'>".
"<div class='col-md-6'>".
"<input type='hidden' class='productIds' value='".$product['PK_ID']."' name='productIds[]'>".
"<h6 class='tx-13 tx-inverse tx-semibold mg-b-0'>".$product['ProductName']."</h6>".
"<span class='d-block tx-11 text-muted'>General / No Company</span>".
"</div>".
"<div class='col-md-3 increase-decrease'>".
"<div class='row' style='font-size:16px'>".
"<div class='number'>". 
"<span class='minus'>-</span>". 
"<input class='qtys' type='number' value='1' min='1' name='Quantity'>". 
"<span class='plus'>+</span>".
"<input type='hidden' class='unitPrice' value='$product[Price]'>".
"<span class='prices' style='padding:30px; font-size:15px' text='".$product['Price']."'>".$product['Price']."</span>".
"</div>".
"</div>".
"</div>".
"<div class='col-md-3'>".
"</div>".
"</div>".
"</li>";

$searchResult = array(
    $row,
    $totalPrice,
    $totalBill,
    $gst
);
echo json_encode($searchResult);