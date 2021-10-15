<?php
session_start();
if (!isset($_SESSION['token_validate'])) {
    header("location:login.php");
}
?>