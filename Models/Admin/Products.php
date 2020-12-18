<?php

include_once('../../config.php');
include_once('ProductsModel.php');
include_once('StocksModel.php');


$model = new ProductModel();

//////////////////Add Product//////////////////////
if(isset($_POST['addProduct'])){
    $status = true;
    //Empty Strings Check
    if(empty($_POST['ProductName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Products?ProductName=Product Name is Required#addnew");
    }
    if(empty($_POST['Price'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Products?Price=Price is Required#addnew");
    }
    
    //Validating Input
    // if(!validatePlainText($_POST['ProductName'])){
    //     $status = false;
    //     redirectWindow("$_HTMLROOTURI/Controllers/Admin/Products?ProductName=Product name can only contain letters and spaces#addnew");
    // }

    $productCode = generateProductCode();

    while (checkExistance("tbl_product", "ProductCode", $productCode, connect())) {
        $productCode = generateProductCode(6);
    }

    if($status){
        echo $model->Add(
            $productCode,
            $_POST['ProductName'],
            $_POST['Price'],
            $_POST['FK_Category'],
            $_POST['FK_Company'],
            $_POST['Image'],
            $_POST['Features'],
        );
        
        $verifyProductCode = verifyValues(
            "tbl_product",
            array(
                "ProductCode",
                $productCode
            ),
            connect()
        );

        $validProduct = mysqli_fetch_array($verifyProductCode);
        $productId = $validProduct[0];
        $stockModel = new StockModel();

        $stockModel->Add(
            $productId,
            0
        );

        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Products?Success=Product Added Successfully");
    }
    else{
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Products?Failure=Internal Server Error");
    }
}

////////////////Edit Product////////////////////////
if(isset($_POST['editProduct'])){
    $status = true;
    //Empty Strings Check
    if(empty($_POST['ProductName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Products?ProductName=Product Name is Required#addnew");
    }

    if(empty($_POST['Price'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Products?Price=Price is Required#addnew");
    }
    
    //Validating Input
    if(!validatePlainText($_POST['ProductName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Products?ProductName=Product name can only contain letters and spaces#addnew");
    }
    
    if($status){
        $model->Edit(
            $_POST['id'],
            $_POST['ProductName'],
            $_POST['Price'],
            $_POST['FK_Category'],
            $_POST['FK_Company'],
            $_POST['Image'],
            $_POST['Features']
        );
    
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Products?Success=Product Modified Successfully");
    }
    else{
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Products?Failure=Internal Server Error");
    }
}

//////////////////Delete Product//////////////////////
if(isset($_POST['deleteProduct'])){
    $status= true;
    if(empty($_POST['id'])){
        $status = false;
        http_response_code(400);
    }
    if($status){
        $model->Delete($_POST['id']);
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Products?Success=Product Deleted Successfully");
    }
}

include_once('../../errors/errors.php');


?>