<?php
session_start();
if (isset($_SESSION['validity']) && $_SESSION['validity'] == 'success') {
    header("location:dashboard_user.php");
} 

if (isset($_SESSION['types']) && $_SESSION['types'] == 'admin') {

    header("location:dashboard_admin.php");
  }
?>