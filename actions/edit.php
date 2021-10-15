<?php

include "../configure/database.php";

include "../dbmodel/dbmodel.php";

$id =mysqli_real_escape_string($conn, $_GET['id']);
$count = 0;
//first query
$table="user";
$column="id,first_name,last_name,gender,email,phone,passwords";
$condition="user.id=$id && status='active'";
$result=select($table,$column,$condition);

$row = mysqli_fetch_array($result);
//process of form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $edit_id = mysqli_real_escape_string($conn, $_POST['id']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $passwords = mysqli_real_escape_string($conn, md5($_POST['passwords']));
//second query
$table_2="user";
$column_2="email";
$condition_2="email='$email' and status='active'";
$result3=select($table_2,$column_2,$condition_2);

    if ($result3 != true) {
        echo "Failed to connect to MySQL0: " . mysqli_connect_error();
    }
    $row3 = mysqli_fetch_array($result3);
    if (is_null($row3['email']) != true) {
        $email_userErr2 = "Email not available ";
        $count++;
    }

    if ($count == 0) {

        $result2 = mysqli_query($conn, $query2);
        $field['first_name'] = $first_name;
        $field['last_name'] = $last_name;
        $field['phone'] = $phone;
        $table = "user";
        $condition = "id='$edit_id' AND status='active'";
        UpdateTable($table, $field, $condition);
        print_r($field);
//session for growl messeges which are shown in view all accounts using file included in view all accounts
        $_SESSION['messege_text'] = "Updated Successfully";
        $_SESSION['messege_type'] = "success";
        header("location:../view_all_accounts.php");
    }
}
