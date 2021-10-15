<?php

session_start();
include "../../configure/database.php";

include "../../dbmodel/dbmodel.php";

$count = 0;
$id =mysqli_real_escape_string ($conn,$_GET['id']);

$query00 = "select * from user where user.id=$id  && status='active'";
$result00 = mysqli_query($conn, $query00);
if ($result00 != true) {
    echo "Failed to connect to MySQL1: " . mysqli_connect_error();
}
$row00 = mysqli_fetch_array($result00);
$receiver_account_number = $row00['account_number'];
$receiver_first_name = $row00['first_name'];
$receiver_last_name = $row00['last_name'];
$my_id = $_SESSION['id'];
?>