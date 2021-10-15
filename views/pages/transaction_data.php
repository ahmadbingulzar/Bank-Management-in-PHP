<?php

session_start();

include "../../configure/database.php";

include "../../dbmodel/dbmodel.php";
$id = $_GET['id'];
$actual_balance = $_SESSION['actual_balance'];
$my_id = $_SESSION['id'];
$balance = $_POST['balance'];
$count = 0;

$sql="select * from user where user.id=$id && status='active'";
$result_0=mysqli_query($conn,$sql);
if ($result_0 != true) {
  echo "Failed to connect to MySQL1: " . mysqli_connect_error();
}

$row00 = mysqli_fetch_array($result_0);
 $receiver_account_number = $row00['account_number'];
 $receiver_first_name = $row00['first_name'];
 $receiver_last_name = $row00['last_name'];

?>