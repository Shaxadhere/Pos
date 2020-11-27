<?php

include_once('../../config.php');
include_once('CustomersModel.php');


$model = new CustomersModel();

if(isset($_POST['addCustomer'])){
    //Empty Strings Check
    if(empty($_POST['CustomerName'])){
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/customers?CustomerName=Customer Name is Required#addnew");
    }
    if(empty($_POST['Address'])){
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/customers?Address=Address is Required#addnew");
    }
    if(empty($_POST['PostalCode'])){
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/customers?PostalCode=Postal Code is Required#addnew");
    }
    if(empty($_POST['City'])){
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/customers?City=City is Required#addnew");
    }
    if(empty($_POST['State'])){
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/customers?State=State is Required#addnew");
    }
    if(empty($_POST['Mobile'])){
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/customers?Mobile=Mobile is Required#addnew");
    }
    
    //Validating Input
    if(validatePlainText($_POST['CustomerName'])){
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/customers?CustomerName=Customer name can only contain letters and spaces#addnew");
    }

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

    redirectWindow("$_HTMLROOTURI/Controllers/Admin/customers?Success=Customer Added Successfully");
}




?>