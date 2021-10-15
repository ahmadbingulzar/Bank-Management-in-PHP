<?php

session_start();

include "../configure/database.php";

include "../dbmodel/dbmodel.php";

include "validations/reset_password_validation.php";

$count = 0;

if (isset($_POST['pass'])) {

    if ($_SESSION['response_error']['status'] == "failed"){
    
header("location:../reset_password.php");

}

else{ 
    $user_email = $_SESSION['checked_email'];

    $_new_password1 = md5($_POST['password1']);
        $_new_password2 = md5($_POST['password2']);

            $table = "user";
            $field['passwords'] = $_new_password2;
            $condition = "user.email='$user_email' && status='active'";

            if (UpdateTable($table, $field, $condition) == true) 
             
            {
                echo "passwfdrd updated";
                $success = "1";
                $_SESSION['success'] = $success;
               header("location:../login.php");
                exit;    
            }
        }
}


