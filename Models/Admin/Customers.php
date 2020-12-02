<?php

include_once('../../config.php');
include_once('CustomersModel.php');


$model = new CustomersModel();

//////////////////Add Customer//////////////////////
if(isset($_POST['addCustomer'])){
    $status = true;
    //Empty Strings Check
    if(empty($_POST['CustomerName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?CustomerName=Customer Name is Required#addnew");
    }
    if(empty($_POST['Address'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?Address=Address is Required#addnew");
    }
    if(empty($_POST['PostalCode'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?PostalCode=Postal Code is Required#addnew");
    }
    if(empty($_POST['City'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?City=City is Required#addnew");
    }
    if(empty($_POST['State'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?State=State is Required#addnew");
    }
    if(empty($_POST['Mobile'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?Mobile=Mobile is Required#addnew");
    }
    
    //Validating Input
    if(!validatePlainText($_POST['CustomerName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?CustomerName=Customer name can only contain letters and spaces#addnew");
    }
    if(!validateEmail($_POST['Email'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?Email=Could not validate email#addnew");
    }

    if($status){
        $model->Add(
            $_POST['CustomerName'],
            $_POST['Address'],
            $_POST['PostalCode'],
            $_POST['Landmark'],
            $_POST['City'],
            $_POST['State'],
            $_POST['Phone'],
            $_POST['Email'],
            $_POST['Fax'],
            $_POST['Mobile'],
            $_POST['Note']
        );
    
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?Success=Customer Added Successfully");
    }
    else{
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?Failure=Internal Server Error");
    }
}

////////////////Edit Customer////////////////////////
if(isset($_POST['editCustomer'])){
    $status = true;
    //Empty Strings Check
    if(empty($_POST['CustomerName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?CustomerName=Customer Name is Required#editData");
    }
    if(empty($_POST['Address'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?Address=Address is Required#editData");
    }
    if(empty($_POST['PostalCode'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?PostalCode=Postal Code is Required#editData");
    }
    if(empty($_POST['City'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?City=City is Required#editData");
    }
    if(empty($_POST['State'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?State=State is Required#editData");
    }
    if(empty($_POST['Mobile'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?Mobile=Mobile is Required#editData");
    }
    
    //Validating Input
    if(!validatePlainText($_POST['CustomerName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?CustomerName=Customer name can only contain letters and spaces#editData");
    }
    if(!validateEmail($_POST['Email'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?Email=Could not validate email#editData");
    }

    if($status){
        $model->Edit(
            $_POST['id'],
            $_POST['CustomerName'],
            $_POST['Address'],
            $_POST['PostalCode'],
            $_POST['Landmark'],
            $_POST['City'],
            $_POST['State'],
            $_POST['Phone'],
            $_POST['Email'],
            $_POST['Fax'],
            $_POST['Mobile'],
            $_POST['Note']
        );
    
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?Success=Customer Modified Successfully");
    }
    else{
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?Failure=Internal Server Error");
    }
}

//////////////////Delete Customer//////////////////////
if(isset($_POST['deleteCustomer'])){
    $status= true;
    if(empty($_POST['id'])){
        $status = false;
        http_response_code(400);
    }
    if($status){
        $model->Delete($_POST['id']);
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Customers?Success=Customer Deleted Successfully");
    }
}

include_once('../../errors/errors.php');


?>