<?php

include_once('Admin/CustomersModel.php');
include_once('PosModel.php');
include_once('Admin/SalesModel.php');

include_once('../config.php');


$CustomerModel = new CustomersModel();
$PosModel = new POSModel();
$SalesModel = new SalesModel();

$status = true;
$totalPrice = 0;
$errors = array();

//Empty Strings Check
if (empty($_REQUEST['CustomerName'])) {
    $status = false;
    $errors['CustomerName'] = "Customer Name is Required";
}
if (empty($_REQUEST['Address'])) {
    $status = false;
    $errors['Address'] = "Address is Required";
}
if (empty($_REQUEST['City'])) {
    $status = false;
    $errors['City'] = "City is Required";
}
if (empty($_REQUEST['State'])) {
    $status = false;
    $errors['State'] = "State is Required";
}
if (empty($_REQUEST['Mobile'])) {
    $status = false;
    $errors['Mobile'] = "Mobile is Required";
}

//Validating Input
if (!validatePlainText($_REQUEST['CustomerName'])) {
    $status = false;
    $errors['CustomerName'] = "Customer name can only contain letters and spaces";
}

if ($status) {
    $CustomerModel->Add(
        $_REQUEST['CustomerName'],
        $_REQUEST['Address'],
        $_REQUEST['PostalCode'],
        $_REQUEST['Landmark'],
        $_REQUEST['City'],
        $_REQUEST['State'],
        $_REQUEST['Phone'],
        $_REQUEST['Email'],
        $_REQUEST['Fax'],
        $_REQUEST['Mobile'],
        $_REQUEST['Note']
    );
}




$ProductIds = $_REQUEST['ProductIds'];
$Qtys = $_REQUEST['Qtys'];
$Prices = $_REQUEST['Prices'];
$AmountPaid = $_REQUEST['AmountPaid'];


$PricesArray = explode(",", $Prices);
$ProductIdsArray = explode(",", $ProductIds);
$QtyArray = explode(",", $Qtys);


foreach ($PricesArray as $price) {
    $totalPrice = $totalPrice + $price;
}

$returnPrice = intval($AmountPaid) - $totalPrice;
$gst = round(0.17 * $totalPrice);
$totalBill = $totalPrice + $gst;



$customer = $PosModel->fetchLastCustomer();
$SalesModel->Add(
    $totalBill,
    $customer[0]
);

$sale = $SalesModel->getLastSales();
$SalesModel->AddInvoice(
    $ProductIdsArray,
    $sale[0],
    $QtyArray
);

$result = array(
    $totalPrice,
    $returnPrice,
    $gst,
    $totalBill,
    $error
);
echo json_encode($result);

include_once('../errors/errors.php');
?>