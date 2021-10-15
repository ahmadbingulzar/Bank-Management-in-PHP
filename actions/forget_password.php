<?php
session_start();

include "../configure/database.php";

include "mail.php";             //for mailing

include "../dbmodel/dbmodel.php";

$email1 =mysqli_real_escape_string($conn, $_POST['email']);
$_SESSION['email_validate'] = $email;
$token;
$validate = "hello i am here";
//process after form submission
if (isset($_POST['login'])) {

$table="user";
$column="email,types";
$condition="email='$email1' && status='active'";
$result0=select($table,$column,$condition);
    if ($result0 != true) {
        echo "Failed to connect to MySQL0: " . mysqli_connect_error();
    }
    if ($email_userErr = is_null($row0['email']) == true) {
        $email_userErr = "Email not found ";
    }

    while ($row0 = mysqli_fetch_array($result0)) {
        if ($row0['email'] == "$email1" && $row0['types'] == 'user') {
            echo "email found";
            $_SESSION['checked_email'] = $email1;
            $token = rand(5874589, 1025458952);
            $_SESSION['token_number'] = $token;

            if (my_mail($email1, $token) == true) {

                echo "email sent";
                $_SESSION['validate'] = $validate;
                header("location:../token_check.php");
            } else {
                echo "not sent";
            }
        } else if ($row0['types'] == 'admin') {
            $email_userErr2 = "Email not found ";
        }
    }
}
