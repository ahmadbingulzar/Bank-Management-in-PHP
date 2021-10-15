<?php

include "../configure/database.php";

include "../dbmodel/dbmodel.php";

include "validations/login_validations.php";

include "mail.php";


$token;
//process for form submission
if (isset($_POST['login'])) {
  
    if ($_SESSION['response_error']['status'] == "failed") {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $email1 = mysqli_real_escape_string($conn,$_POST['email']);
        $passwords =mysqli_real_escape_string($conn,md5($_POST['passwords']));
//first query        
$table="user";
$column="*";
$condition="email='$email1' && passwords='$passwords' && status='active'";

       $result=select($table,$column,$condition);
        if ($result) {

            $row = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) == 1) {
                if ($row['types'] == "user") {

                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['types'] = $row['types'];
                    $_SESSION['id'] = $row['id'];
                    $_email1 = $row['email'];

                    $token = rand(5874589, 1025458952);

                    if (my_mail($email1, $token) == true) {
                        echo "email sent";
                        $_SESSION['two_way_token'] = $token;
                        header("location:../authentication_token.php");
                    } else {
                        echo "not sent";
                    }
                } else if ($row['types'] == "admin") {

                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['types'] = $row['types'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION["login_time_stamp"] = time();
                    header("location:../dashboard_admin.php");
                }
            } else {
                $_SESSION['response_error']['status'] = "failed";
                $_SESSION['response_error']['errors']['email']['error'] = "Authentication Failed";
                //redirection to pages/login with error messeges if any
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
    }

}
