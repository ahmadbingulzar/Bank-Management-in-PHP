<?php
session_start();
include "../configure/database.php";


 $_token_number_user =mysqli_real_escape_string($conn, $_POST['token']);
$_SESSION['token_validate'] = $_token_number_user;
 $token_number = $_SESSION['token_number'];


if (isset($_POST['check'])) {

    if ($_token_number_user == $token_number) {
        header("location:../reset_password.php");
        exit;
    } 
    else
        echo "No match";
        header("location:../token_check.php");
        exit;
}
?>

