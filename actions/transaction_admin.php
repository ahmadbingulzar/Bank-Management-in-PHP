<?php

session_start();
include "../configure/database.php";

include "../dbmodel/dbmodel.php";

include "mail.php";

$count = 0;
$id =mysqli_real_escape_string ($conn,$_GET['id']);
//first query
$table="user";
$column="*";
$condition="user.id=$id  && status='active'";

$result_1=select($table,$column,$where);
if ($result_1 != true) {
    echo "Failed to connect to MySQL1: " . mysqli_connect_error();
}
$row00 = mysqli_fetch_array($result_1);
$receiver_account_number = $row00['account_number'];
$receiver_first_name = $row00['first_name'];
$receiver_last_name = $row00['last_name'];
$my_id = $_SESSION['id'];
//process of form submission
if (isset($_POST['save'])) {
    $balance = $_POST['balance'];
    $actual_balance = $_SESSION['actual_balance'];
//second query
$table_2="user";
$column_2="user.balance ,user.email";
$condition_2="user.id=$my_id && status='active'";

$result_2=select($table_2,$column_2,$condition_2);
    if ($result_2 != true) {
        echo "Failed to connect to MySQL2: " . mysqli_connect_error();
    }
    $row0 = mysqli_fetch_array($result_2);
    $money_sender_email = $row0['email'];
    if ($balanceErr = $_POST["balance"] <= 0) {
        $balanceErr = "Balance should be greater then zero ";
        $count++;
    }  
if ($count == 0) { 
    $user="transaction";
    $column="`transfer_from`,`transfer_to`,`amount`";
    $values= "'$my_id', '$id', '$balance'";
   
      if(create($user,$column,$values)!=true)
        {echo "efsdf";
            echo "Failed to connect to MySQL3: " . mysqli_connect_error();
        } else { 
            echo '<script> 
    alert("Transfered successfully");
    </script>';
$detail="Transaction details 
Money credited=$balance
Transfered to :$receiver_account_number
Name:$receiver_first_name  $receiver_last_name";

if(my_mail($money_sender_email,$detail)==true){ 
             
                $_SESSION['messege_type']="success";
                $_SESSION['messege_text']="Balance added successfully";
                header("location:../view_all_accounts.php");
                exit;
            } 
            else {
                echo "not sent";
                $_SESSION['messege_type']="failure";
                $_SESSION['messege_text']="Balance not added ";
                header("location:../view_all_accounts.php");        
                exit;

            }
        }
    }
}

?>

