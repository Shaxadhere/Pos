<?php

include_once('../../config.php');
include_once('CompanyModel.php');


$model = new CompanyModel();

//////////////////Add Company//////////////////////
if(isset($_POST['addCompany'])){
    $status = true;
    //Empty Strings Check
    if(empty($_POST['CompanyName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Company?CompanyName=Company Name is Required#addnew");
    }

    //Validating Input
    if(!validatePlainText($_POST['CompanyName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Company?CompanyName=Company name can only contain letters and spaces#addnew");
    }

    if($status){
        $model->Add(
            $_POST['CompanyName']
        );
    
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Company?Success=Company Added Successfully");
    }
    else{
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Company?Failure=Internal Server Error");
    }
}

////////////////Edit Company////////////////////////
if(isset($_POST['editCompany'])){
    $status = true;
    //Empty Strings Check
    if(empty($_POST['CompanyName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Company?CompanyName=Company Name is Required#editData");
    }

    if(empty($_POST['id'])){
        $status = false;
        http_response_code(400);
    }
    
    //Validating Input
    if(!validatePlainText($_POST['CustomerName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Company?CompanyName=Company name can only contain letters and spaces#editData");
    }
    
    if($status){
        $model->Edit(
            $_POST['id'],
            $_POST['CustomerName']
        );
    
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Company?Success=Company Modified Successfully");
    }
    else{
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Company?Failure=Internal Server Error");
    }
}

//////////////////Delete Company//////////////////////
if(isset($_POST['deleteCompany'])){
    $status= true;
    if(empty($_POST['id'])){
        $status = false;
        http_response_code(400);
    }
    if($status){
        $model->Delete($_POST['id']);
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Company?Success=Company Deleted Successfully");
    }
}

include_once('../../errors/errors.php');


?>