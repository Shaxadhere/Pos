<?php

include_once('../config.php');


//Request from login confirm
if(isset($_POST['login'])){
    //if it contains email in POST
    if(isset($_POST['email'])){
        //if email is empty string
        if(empty($_POST['email'])){
            redirectWindow("index?email=Email cannot be empty");
        }
        //if email is invalid
        else if(!validateEmail($_POST['email'])){
            redirectWindow("index?email=Invalid Email");
        }
    }

    //if it contains password in POST
    if(isset($_POST['password'])){
        //if password is empty string
        if(empty($_POST['password'])){
            redirectWindow("index?password=Password cannot be empty");
        }
    }

    //verifies the email entered
    $user = verifyValues(
        "tbl_user",
        array(
            "Email",
            $_POST['email']
        ),
        connect()
    );

    //saving the result in a variable
    $ValidUser = mysqli_fetch_array($user);

    //checking if the account exists
    if(isset($ValidUser)){
        //checking the password
        if(password_verify($_POST['password'], $ValidUser['Password'])){
            $UserType = $ValidUser['FK_UserType'];
            session_start();
            $_SESSION["USER"] = $ValidUser;
            if($UserType == 1){
                redirectWindow("$_HTMLROOTURI/Controllers/Admin/");
            }
            else if($UserType == 2){
                redirectWindow("$_HTMLROOTURI/Controllers/Manager/");
            }
            else if($UserType == 3){
                redirectWindow("$_HTMLROOTURI/Controllers/Employee/");
            }
            else{
                return http_response_code(400);
            }
        }
        //returning password is incorect
        else{
            redirectWindow("index?password=Invalid password");
        }
    }
    //returning Email doesnt exists
    else{
        redirectWindow("index?email=Email doesnt exists");
    }
}

include_once("../errors/errors.php");





?>