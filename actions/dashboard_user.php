<?php
session_start();
include "../../configure/database.php";
if (!isset($_SESSION['validity'])) {
    header("location:login.php");
}
$user = $_SESSION['first_name'];
$user_id = $_SESSION['id'];

$query1 = "select sum(amount) from transaction where transfer_from=$user_id ";
$result1 = mysqli_query($conn, $query1);
$row = mysqli_fetch_array($result1);
if ($result1 != true) {
    echo "Failed to connect to MySQL1: " . mysqli_connect_error();
}
$debit = $row['sum(amount)'];

$query2 = "select sum(amount) from transaction where transfer_to=$user_id ";
$result2 = mysqli_query($conn, $query2);
$row = mysqli_fetch_array($result2);
if ($result2 != true) {
    echo "Failed to connect to MySQL2: " . mysqli_connect_error();
}
$credit = $row['sum(amount)'];
$actual_balance = $credit - $debit;
$_SESSION['actual_balance'] = $actual_balance;

$query0 = "update user
set balance=$actual_balance
where user.id=$user_id";
$result0 = mysqli_query($conn, $query0);
if ($result0 != true) {
    echo "Failed to connect to MySQL3: " . mysqli_connect_error();
}
?>
