<?php
session_start();
include "../configure/database.php";

if (!isset($_SESSION['first_name']) || $_SESSION['types'] != 'admin') {
  header("location:login.php");
}
?>