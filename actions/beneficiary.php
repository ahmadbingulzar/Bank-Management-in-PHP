<?php

include "../../configure/database.php";

include "../views/Assests/js/session_messege.php";

include "../../dbmodel/select.php";

$my_id = $_SESSION['id'];
$account_number =mysqli_real_escape_string($conn, $_POST['account_number']);
$first_name =mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name =mysqli_real_escape_string($conn, $_POST['last_name']);

$table_1="user";
$table_2="benificaries on benificaries.friend_id=user.id
and benificaries.user_id=$my_id";
$column="user.first_name,user.last_name,user.account_number,user.id";
$condition="user.status='active'";
$join="inner JOIN";
$order_by="";

$result=select_complex($table_1,$table_2,$column,$condition,$join,$order_by);
if ($result != true) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$row = mysqli_num_rows($result);
