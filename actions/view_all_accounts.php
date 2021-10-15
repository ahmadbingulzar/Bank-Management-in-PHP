<?php
session_start();
include "../layouts/dashboard_admin.php";

include "../../configure/database.php";

include "../Assests/js/session_messege.php";

include "../../dbmodel/select.php";
//first and only query to retrieve all records of user table from database
$table_1="user";
$table_2="";
$column="*";
$condition="user.types='user' && status='active'";
$order_by="id DESC";
$join="";

$result=select_complex($table_1,$table_2,$column,$condition,$join,$order_by);
if($result!=true)
{
    echo "db not working";
}
$row = mysqli_num_rows($result);
?>
