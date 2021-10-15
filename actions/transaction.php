<?php

session_start();

include "../configure/database.php";

include "../dbmodel/dbmodel.php";
//response error array for displaying error messeges generated inside queries
$response_error=array();
session_unset('response_error');
$status="success";
$errors=array();

$actual_balance = $_SESSION['actual_balance'];
$my_id =mysqli_real_escape_string($conn, $_SESSION['id']);
$balance =mysqli_real_escape_string($conn, $_POST['balance']);
$id =mysqli_real_escape_string($conn, $_GET['id']);
$count = 0;
$actual_balance;
//first query
$table_1="user";
$column_1="*";
$condition_1="user.id=$id && status='active'";
$result_0=select($table_1,$column_1,$condition_1);

if ($result_0 != true) {
  echo "Failed to connect to MySQL1: " . mysqli_connect_error();
}

$row00 = mysqli_fetch_array($result_0);
$receiver_account_number = $row00['account_number'];
$receiver_first_name = $row00['first_name'];
$receiver_last_name = $row00['last_name'];


//process of form submission
if (isset($_POST['save'])) {
$table="user";
$column="user.balance,user.email";
$condition="user.id=$my_id && status='active'";
$result_1=select($table,$column,$condition);

  if ($result_1 != true) {
    echo "Failed to connect to MySQL1: " . mysqli_connect_error();
  }
  $row0 = mysqli_fetch_array($result_1);
  $money_sender_email = $row0['email'];
 
  if ($balanceErr = $_POST["balance"] > $actual_balance) {
    $errors['not_found']['error']="Not enough balance ";
     $status="failed";
    $count++;
  }

  if ($balanceErr = $_POST["balance"] <= 0) {
    $errors['not_found']['error']="Balance should be greater then zero ";
    $status="failed";
    $count++;
  }
  $response_error['status']=$status;
  $response_error['errors']=$errors;
  $_SESSION['response_error']=$response_error; 
if($_SESSION['response_error']['status']=="failed")
{
  header("location:../transaction.php?id=".$id);    //redirection towards pages with user id from get method
  exit;
}

  if ($count == 0) {  

    $user="transaction";
    $column="`transfer_from`,`transfer_to`,`amount`";
    $values= "'$my_id', '$id', '$balance'";
if(create($user,$column,$values)!=true)
    {
      echo "Failed to connect to MySQL2: " . mysqli_connect_error();
    }  
    else {
      echo '<script> 
    alert("Transfered successfully");
    </script>';

   $details= "Transaction details 
    Money credited=$balance
    Transfered to :$receiver_account_number
    Name:$receiver_first_name  $receiver_last_name";

if(my_mail($money_sender_email,$details)==true)
    {
        echo "email sent";
        $_SESSION['messege_type'] = "success";
        $_SESSION['messege_text'] = "Transaction Done";
      
        header("location:../dashboard_user.php");
        exit;
      } else {
        header("location:../dashboard_user.php");
        exit;
      }
    }
  }
}
?>

