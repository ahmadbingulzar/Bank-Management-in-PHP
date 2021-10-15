<?php
session_start();
include "../configure/database.php";

include "../actions/validations.php";

include "../dbmodel/dbmodel.php";                           //functions of queries

include "validations/create_account_validations.php";      //validations and error messeges file

$count = 0;
$user_id = $_SESSION['id'];
//process of form submission
    if (isset($_POST['submit'])) {

$_SESSION['first_field ']    =    $first_name  =mysqli_real_escape_string($conn, $_POST['first_name']);
$_SESSION['second_field']    =    $last_name   =mysqli_real_escape_string($conn, $_POST['last_name']);
$_SESSION['third_field ']    =     $gender     =mysqli_real_escape_string($conn, $_POST['gender']);
$_SESSION['fourth_field']    =     $email      =mysqli_real_escape_string($conn, $_POST['email']);
$_SESSION['fifth_field ']    =     $passwords  =mysqli_real_escape_string($conn, $_POST['passwords']);
$_SESSION['sixth_field ']    =     $phone      =mysqli_real_escape_string($conn, $_POST['phone']);
$_SESSION['seventh_field']   =     $balance    =mysqli_real_escape_string($conn, $_POST['balance']);

if($_SESSION['response_error']['status']=="failed"){
    header("location:../creat_account.php");
    exit;
}
//first query
$table_1="user";
$column_1="email";
$condition_1="email='$email' and status='active'";
$result3=select($table_1,$column_1,$condition_1);
    if ($result3 != true) {
        echo "Failed to connect to MySQL0: " . mysqli_connect_error();
    }


    $row3 = mysqli_fetch_array($result3);
    if (is_null($row3['email']) != true) {
        $count++;
        $_SESSION['response_error']['errors']['email']['error']="Email not available ";
        $_SESSION['response_error']['status'] = "failed";
        header("location:../creat_account.php");
        exit;
    }

    $passwords = md5($_POST['passwords']);
    $account_number = $check;

    do {
        $account_number = rand(5874589, 1025458952);
        $query = "select account_number from user";
        $check = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($check);
    } while ($row == $account_number);

   //second query
        $user = "user";
        $column = "`first_name`,`last_name`,`gender`,`email`,`phone`,`passwords`,`types`,`account_number`,`balance`,`status`";
        $values = "'$first_name','$last_name','$gender','$email','$phone','$passwords','user','$account_number','$balance','active'";
        //inserting mysql query to insert data
        if (create($user, $column, $values) != true) {
            echo "Failed to connect to MySQL5: " . mysqli_connect_error();
        } else {
            $_SESSION['messege_type'] = "success";
        }

        $_SESSION['messege_text'] = "Account Created Successfully";
        $table_from="user";
        $column_from="id";
        $condition="email='$email' and status='active'";
        $result5=select($table_from,$column_from,$condition);
        if ($result5 != true) {
            echo "Failed to connect to MySQL4: " . mysqli_connect_error();
        }
        $row5 = mysqli_fetch_array($result5);
        $my_friend = $row5['id'];
        $table_name = "transaction";
        $column_name = "transfer_from,transfer_to,amount";
        $values = "'$user_id','$my_friend',$balance";
        if (create($table_name, $column_name, $values) != true) {
            echo "Failed to connect to MySQL5: " . mysqli_connect_error();
        }
        //redirect to pages with error messeges if any
        header("location:../view_all_accounts.php");
        exit;
    }
?>
