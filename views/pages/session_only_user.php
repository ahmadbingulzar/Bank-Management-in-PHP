<?php
session_start();
if (!isset($_SESSION['first_name']) || $_SESSION['types'] == 'admin') {
  header("location:login.php");
}
?>