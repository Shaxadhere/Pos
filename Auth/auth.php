<?php

include_once('../config.php');


//Request from login confirm
if (isset($_POST['login'])) {
  //if it contains email in POST
  if (isset($_POST['email'])) {
    //if email is empty string
    if (empty($_POST['email'])) {
      redirectWindow("index?email=Email cannot be empty");
    }
    //if email is invalid
    else if (!validateEmail($_POST['email'])) {
      redirectWindow("index?email=Invalid Email");
    }
  }

  //if it contains password in POST
  if (isset($_POST['password'])) {
    //if password is empty string
    if (empty($_POST['password'])) {
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
  if (isset($ValidUser)) {
    //checking the password
    if (password_verify($_POST['password'], $ValidUser['Password'])) {
      $UserType = $ValidUser['FK_UserType'];
      session_start();
      $_SESSION["USER"] = $ValidUser;
      if ($UserType == 1) {
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/");
      } else if ($UserType == 2) {
        redirectWindow("$_HTMLROOTURI/Controllers/Manager/");
      } else if ($UserType == 3) {
        redirectWindow("$_HTMLROOTURI/Controllers/Employee/");
      } else {
        return http_response_code(400);
      }
    }
    //returning password is incorect
    else {
      redirectWindow("index?password=Invalid password");
    }
  }
  //returning Email doesnt exists
  else {
    redirectWindow("index?email=Email doesnt exists");
  }
}

//Request from forgot confirm
if (isset($_POST['forgot'])) {
  //if it contains email in POST
  if (isset($_POST['email'])) {
    //if email is empty string
    if (empty($_POST['email'])) {
      redirectWindow("index?email=Email cannot be empty");
    }
    //if email is invalid
    else if (!validateEmail($_POST['email'])) {
      redirectWindow("forgotPassword?email=Invalid Email");
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
  if (isset($ValidUser)) {

    include_once('../assets/phprapid/assets/class.phpmailer.php');
    $mail = new PHPMailer();
    $antiForgeryToken = random_strings(50);
    editData(
      "tbl_user",
      array(
        "token",
        $antiForgeryToken
      ),
      "PK_ID",
      $ValidUser[0],
      connect()
    );

    $reset_Url = "<a href='http://$_SERVER[HTTP_HOST]/auth/verify?'>Reset Your Password</a>";

    $message = "<!DOCTYPE html
        PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
      <html xmlns='http://www.w3.org/1999/xhtml'>
      
      <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title>Password Reset Email Template</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans&display=swap' rel='stylesheet'>
      </head>
      <style>
        body {
          height: 100%;
          width: 100%;
          margin: 0;
          padding: 0;
          font-family: 'Open Sans', sans-serif;
          font-size: 16px;
          background-color: #F6F9FC;
        }
      
        table {
          border-collapse: collapse;
          width: 100%;
          max-width: 600px;
          font-size: inherit;
          margin-top: 40px;
        }
      
        thead {}
      
        tbody {
          border-top: 3px solid #0B79D9;
          background-color: #FFFFFF;
        }
      
      
        th {
          height: 60px;
          padding: 10px 20px;
        }
      
        td {
          font-size: 14px;
          line-height: 1.8;
          padding: 10px 20px;
        }
      
        .center {
          text-align: center;
        }
      
        .space-y {
          padding-top: 40px;
          padding-bottom: 40px;
        }
      
        .text-muted {
          color: #8898AA;
        }
      
        .text-primary {
          color: #0B79D9;
        }
      
        .disregard {
          font-size: 12px;
        }
      
        .disregard__text {
          width: 50%;
        }
      
        .brand__name {
          text-align: left;
        }
      
        .button--reset {
          padding: 12px 20px;
          border-radius: 5px;
          background-color: #0B79D9;
          color: white;
          font-size: 14px;
          letter-spacing: 0.25px;
          text-decoration: none;
          text-transform: uppercase;
          border: 1px solid #0B79D9;
        }
    
      </style>
      
      <body>
        <table align='center' cellpadding='0' cellspacing='0'>
          <thead>
            <tr>
              <th class='brand__name'></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class='center'>
                <h2>Reset Password</h2>
              </td>
            </tr>
            <tr>
              <td>Hi $ValidUser[1],</td>
            </tr>
            <tr>
              <td class='center'>A password reset was triggered on your account. To proceed with the reset, kindly click on
                the reset button below.</td>
            </tr>
            <tr>
              <td class='center space-y'>
                <a href='http://$_SERVER[HTTP_HOST]$_HTMLROOTURI/auth/verify?token=$antiForgeryToken&uuid=$ValidUser[0]' class='button--reset'>
                  Reset Password
                </a>
              </td>
            </tr>
            <tr align='center'>
              <td class='disregard text-muted'>
                <p class='disregard__text'>Please disregard this email if this action was not triggered by you.</p>
              </td>
            </tr>
          </tbody>
        </table>
      </body>
      </html>
      ";

    $mail->IsSMTP();
    $mail->Host = 'a2plcpnl0202.prod.iad2.secureserver.net';
    $mail->Port = '465';                                //Sets the default SMTP server port
    $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'admin@shaxad.com';                    //Sets SMTP username
    $mail->Password = '786786PkPk';                    //Sets SMTP password
    $mail->SMTPSecure = 'ssl';
    $mail->From = "admin@shaxad.com";
    $mail->FromName = "Point Of Sale";                //Sets the From name of the message
    $mail->AddAddress($ValidUser[2]);
    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject = "Reset Password";
    $mail->Body = $message;
    if ($mail->Send()) {
      redirectWindow("$_HTMLROOTURI/Auth/emailSent");
    } else {
      http_response_code(500);
    }
  }
  //returning Email doesnt exists
  else {
    redirectWindow("forgotPassword?email=Email doesnt exists");
  }
}

if (isset($_POST['SavePassword'])) {
  if (isset($_REQUEST['token']) && isset($_REQUEST['uuid'])) {
    $antiForgeryToken = $_REQUEST['token'];
    $uuid = $_REQUEST['uuid'];
    $fetched = fetchDataById(
      "tbl_user",
      "PK_ID",
      $uuid,
      connect()
    );
    $user = mysqli_fetch_array($fetched);
    $token = $user[6];
    if (!($token == $antiForgeryToken)) {
      redirectWindow("$_HTMLROOTURI/Auth/expired");
    } else {
      $newPassword = $_REQUEST['NewPassword'];
      editData(
        "tbl_user",
        array(
          "Password",
          password_hash($newPassword, 1),
          "token",
          ""
        ),
        "PK_ID",
        $uuid,
        connect()
      );
      $UserType = $user['FK_UserType'];
      session_start();
      $_SESSION["USER"] = $user;
      if ($UserType == 1) {
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/index?Success=Your%20password%20was%20saved%20successfully");
      } else if ($UserType == 2) {
        redirectWindow("$_HTMLROOTURI/Controllers/Manager/index?Success=Your%20password%20was%20saved%20successfully");
      } else if ($UserType == 3) {
        redirectWindow("$_HTMLROOTURI/Controllers/Employee/index?Success=Your%20password%20was%20saved%20successfully");
      } else {
        return http_response_code(400);
      }
    }
  } else {
    redirectWindow("$_HTMLROOTURI/Auth/expired");
  }
}

include_once("../errors/errors.php");
