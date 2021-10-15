<?php

include "../../configure/database.php";

include "../../dbmodel/dbmodel.php";

$id = $_GET['id'];
$count = 0;
$query = "select id,first_name,last_name,gender,email,phone,passwords from user where user.id=$id && status='active'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>