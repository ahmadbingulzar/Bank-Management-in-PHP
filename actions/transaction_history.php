<?php



include "../../configure/database.php";
include "../../dbmodel/select.php";

$actual_balance = $_SESSION['actual_balance'];
$user_id = $_SESSION['id'];

if (isset($_SESSION['messege_type']) && $_SESSION['messege_type'] == 'transaction_done') {
    echo "Balance added successfully";
    unset($_SESSION['messege_type']);
}
//first query
$table_1="transaction";
$table_2="user";
$column="user.account_number,user.first_name,user.last_name,transaction.created_date ,transaction.amount";
$join="INNER join";
$condition="transaction.transfer_from=$user_id and user.id=$user_id && user.status='active'";
$order_by="";

$result=select_complex($table_1,$table_2,$column,$condition,$join,$order_by);

if ($result != true) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$row = mysqli_num_rows($result);
$first_name = $row['user.first_name'];
$last_name = $row['user.last_name'];
$account_number = $row['user.account_number'];
$date = $row['transaction.created_date'];
//second query
$query2_table_1="transaction";
$query2_table_2="user";
$query2_column="user.account_number,user.first_name,user.last_name,transaction.created_date ,transaction.amount";
$query2_join="INNER join";
$query2_condition="transaction.transfer_to=$user_id and user.id=$user_id && status='active'";
$query2_order_by="";

$result2=select_complex($query2_table_1,$query2_table_2,$query2_column,$query2_condition,$join,$query2_order_by);
if ($result2 != true) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$row2 = mysqli_num_rows($result2);
$first_name2 = $row2['user.first_name'];
$last_name2 = $row2['user.last_name'];
$account_number2 = $row2['user.account_number'];
$date2 = $row2['transaction.created_date'];

?>
