<?php

include "../configure/database.php";
session_start();
if (!isset($_SESSION['first_name'])){
  header("location:login.php");
}
?>