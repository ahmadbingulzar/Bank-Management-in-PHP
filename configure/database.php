<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";
// creating connection to the database
$conn =  mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
    //die function breaks the script 
}
?>
