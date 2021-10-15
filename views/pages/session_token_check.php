<?php
session_start();
if (!isset($_SESSION['validate'])) {
    header("location:login.php");
}
?>