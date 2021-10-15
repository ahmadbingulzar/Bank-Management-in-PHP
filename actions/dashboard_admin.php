<?php
session_start();

include "../configure/database.php";

$user = $_SESSION['first_name'];
$user_id = $_SESSION['id'];
//first query is not using function because file is included in pages
$query = "select user.account_number,user.first_name,user.last_name,transaction.created_date ,transaction.amount 
from transaction
inner join user 
where transaction.transfer_from=$user_id && status='active'";

$result = mysqli_query($conn, $query);
if ($result != true) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$row = mysqli_fetch_array($result);
$first_name = $row['user.first_name'];
$last_name = $row['user.last_name'];
$account_number = $row['user.account_number'];
$date = $row['transaction.created_date'];
