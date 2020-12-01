<?php

include_once('../../config.php');
include_once('StockModel.php');


$model = new StockModel();

//////////////////Add Stock//////////////////////
if(isset($_POST['addStock'])){
    $status = true;
    //Empty Strings Check
    if(empty($_POST['ProductCode'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Stock?ProductCode=Product Code is Required#addnew");
    }
    if(empty($_POST['Quantity'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Stock?Quantity=Quantity is Required#addnew");
    }

    if($status){

        $verifyProductCode = verifyValues(
            "tbl_product",
            array(
                "ProductCode",
                $_POST['ProductCode']
            ),
            connect()
        );

        $validProduct = mysqli_fetch_array($verifyProductCode);
        
        $productId = $validProduct['PK_ID'];

        if(checkExistance("tbl_product", "FK_Product", $productId, connect())){
            $model->Edit($productId,$validProduct['Quantity']);
            redirectWindow("$_HTMLROOTURI/Controllers/Admin/Stock?Success=Stock Added Successfully");
        }
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Stock?Failure=Internal Server Error");
    }
    else{
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Stock?Failure=Internal Server Error");
    }
}

////////////////Edit Stock////////////////////////
if(isset($_POST['editStock'])){
    $status = true;
    //Empty Strings Check
    if(empty($_POST['Quantity'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Stock?Quantity=Quantity is Required#addnew");
    }
    if(empty($_POST['id'])){
        $status = false;
        http_response_code(400);
    }
    
    if($status){
        $model->Edit(
            $_POST['id'],
            $_POST['Quantity']
        );
    
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Stock?Success=Stock Modified Successfully");
    }
    else{
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Stock?Failure=Internal Server Error");
    }
}


include_once('../../errors/errors.php');


?>