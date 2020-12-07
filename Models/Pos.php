<?php

include_once('../config.php');

$status = true;
$ProductIds = $_REQUEST['ProductIds'];
$Qtys = $_REQUEST['Qtys'];
$Prices = $_REQUEST['Prices'];
$AmountPaid = $_REQUEST['AmountPaid'];

$PricesArray = explode(",",$Prices);

$totalPrice = 0;
foreach ($PricesArray as $price) {
    $totalPrice = $totalPrice + $price;
}

$returnPrice = intval($AmountPaid) - $totalPrice;
$gst = round(0.17 * $totalPrice);
$totalBill = $totalPrice + $gst;

$result = array(
    $totalPrice,
    $returnPrice,
    $gst,
    $totalBill
);

echo json_encode($result);

// $productsArray = array();
// foreach ($_POST['productIds'] as $id) {
//     array_push($productsArray, array($_POST['productIds'], $_POST['productQtys']));
//     showAlert(json_encode($productsArray));
// }



include_once('../errors/errors.php');
































// if(empty($_POST['CustomerName'])){
//     $status = false;
//     redirectWindow("$_HTMLROOTURI/Controllers/Admin/index?CustomerName=Customer Name is Required");
// }
// if(empty($_POST['Address'])){
//     $status = false;
//     redirectWindow("$_HTMLROOTURI/Controllers/Admin/index?Address=Address is Required");
// }
// if(empty($_POST['PostalCode'])){
//     $status = false;
//     redirectWindow("$_HTMLROOTURI/Controllers/Admin/index?PostalCode=Postal Code is Required");
// }
// if(empty($_POST['City'])){
//     $status = false;
//     redirectWindow("$_HTMLROOTURI/Controllers/Admin/index?City=City is Required");
// }
// if(empty($_POST['State'])){
//     $status = false;
//     redirectWindow("$_HTMLROOTURI/Controllers/Admin/index?State=State is Required");
// }
// if(empty($_POST['Mobile'])){
//     $status = false;
//     redirectWindow("$_HTMLROOTURI/Controllers/Admin/index?Mobile=Mobile is Required");
// }

// //Validating Input
// if(!validatePlainText($_POST['CustomerName'])){
//     $status = false;
//     redirectWindow("$_HTMLROOTURI/Controllers/Admin/index?CustomerName=Customer name can only contain letters and spaces");
// }
// if(!validateEmail($_POST['Email'])){
//     $status = false;
//     redirectWindow("$_HTMLROOTURI/Controllers/Admin/index?Email=Could not validate email");
// }

// if($status){

//     redirectWindow("$_HTMLROOTURI/Controllers/Admin/index?Success=Checked out successfully");
// }
// else{
//     redirectWindow("$_HTMLROOTURI/Controllers/Admin/index?Failure=Internal Server Error");
// }
