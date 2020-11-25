<?php

include_once('../config.php');

$errors = array();


//Adding Product
if(isset($_POST['addProduct'])){
    if(empty($_POST['ProductName'])){
        array_push($errors, "Product Name is required");
    }
    if(empty($_POST['Processor'])){
        array_push($errors, "Processor is required");
    }
    if(empty($_POST['PurchasedFrom'])){
        array_push($errors, "Vendor is required");
    }
    if(empty($_POST['PurchasedIn'])){
        array_push($errors, "Price is required");
    }
    if(empty($_POST['PurchaseDate'])){
        array_push($errors, "Purchase Date is required");
    }
    if(empty($_POST['Qty'])){
        array_push($errors, "Quantity is required");
    }
    
    if($errors[0] == null){
        insertData(
            "tbl_product",
            array(
                "ProductName",
                "Problem",
                "PurchasedFrom", 
                "Processor", 
                "PurchasedIn",
                "DateOfPurchase",
                "Quantity",
                "Accessories",
                "RamType",
                "StorageType",
                "Description"
            ),
            array(
                $_POST['ProductName'],
                $_POST['Problem'],
                $_POST['PurchasedFrom'],
                $_POST['Processor'],
                $_POST['PurchasedIn'],
                $_POST['PurchaseDate'],
                $_POST['Qty'],
                $_POST['Accessories'],
                $_POST['Ram'],
                $_POST['Storage'],
                $_POST['Description']
            ),
            connect()
        );
        redirectWindow("../Controller/Seller/products");
    } else{
        redirectWindow("../Controller/Seller/products?error=$error[0]#addnew");
    }
}

//Remove Product
if(isset($_POST['removeProduct'])){
    showAlert("remove");
}





?>