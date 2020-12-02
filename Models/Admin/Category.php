<?php

include_once('../../config.php');
include_once('CategoryModel.php');


$model = new CategoryModel();

//////////////////Add Category//////////////////////
if(isset($_POST['addCategory'])){
    $status = true;
    //Empty Strings Check
    if(empty($_POST['CategoryName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Category?CategoryName=Category Name is Required#addnew");
    }

    //Validating Input
    if(!validatePlainText($_POST['CategoryName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Category?CategoryName=Category name can only contain letters and spaces#addnew");
    }

    if($status){
        $model->Add(
            $_POST['CategoryName']
        );
    
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Category?Success=Category Added Successfully");
    }
    else{
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Category?Failure=Internal Server Error");
    }
}

////////////////Edit Category////////////////////////
if(isset($_POST['editCategory'])){
    $status = true;
    //Empty Strings Check
    if(empty($_POST['CategoryName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Category?CategoryName=Category Name is Required#editData");
    }

    if(empty($_POST['id'])){
        $status = false;
        http_response_code(400);
    }
    
    //Validating Input
    if(!validatePlainText($_POST['CategoryName'])){
        $status = false;
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Category?CategoryName=Category name can only contain letters and spaces#editData");
    }
    
    if($status){
        $model->Edit(
            $_POST['id'],
            $_POST['CategoryName']
        );
    
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Category?Success=Category Modified Successfully");
    }
    else{
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Category?Failure=Internal Server Error");
    }
}

//////////////////Delete Category//////////////////////
if(isset($_POST['deleteCategory'])){
    $status= true;
    if(empty($_POST['id'])){
        $status = false;
        http_response_code(400);
    }
    if($status){
        $model->Delete($_POST['id']);
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/Category?Success=Category Deleted Successfully");
    }
}

include_once('../../errors/errors.php');


?>