<?php
session_start();
include "../configure/database.php";

//taking session values in variables
 $token = $_SESSION['two_way_token'];
 $name  = $_SESSION['first_name'];
 $email = $_SESSION['email'];
 $types = $_SESSION['types'];
 $id    = $_SESSION['id'];


if (isset($_SESSION['validity'])) {
    header("location:../dashboard_user.php");
}
if (!isset($_SESSION['two_way_token'])) {
    header("location:login.php");
}
$_token_number_user = $_POST['token'];

if (isset($_POST['check'])) {
    if ($token == $_token_number_user) {
        $_SESSION['first_name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['types'] = $types;
        $_SESSION['id'] = $id;
        $validity="success";
        $_SESSION['validity'] = $validity;
        header("location:../dashboard_user.php");
    } 
else 
    {
    //redirection to pages
        echo "No Match";
        header("location:../authentication_token.php");
        exit;
    }

}

?>
