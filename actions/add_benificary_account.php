<?php
session_start();

include "../configure/database.php";

include "../dbmodel/dbmodel.php";

include "../dbmodel/select.php";
//error array for error messeges generated after query execution

$response_error=array();
session_unset('response_error');
$status="success";
$errors=array();


$actual_balance = $_SESSION['actual_balance'];
$count = 0;

//process after form submission
if (isset($_POST['account_number'])) {

    $transfer_from =mysqli_real_escape_string($conn, $_POST['transfer_from']);
    $amount =mysqli_real_escape_string($conn, $_POST['amount']);
    $account_number =mysqli_real_escape_string($conn, $_POST['account_number']);
    $user_id = $_SESSION['id'];
    $table = "user";
    $column = "*";
    $condition = "user.id=$user_id and status='active'";
//first query
    $result1 = select($table, $column, $condition);
    if ($result1 != true) {
        echo "Failed to connect to MySQL1: " . mysqli_connect_error();
    }
    $table_1="user";
    $table_2="benificaries on benificaries.friend_id=user.id";
    $column_1="*";
    $condition_1="benificaries.user_id=$user_id and status='active'";
    $join="inner join";
    $order_by="";
//second query
$result2=select_complex($table_1,$table_2,$column,$condition,$join,$order_by);
    if ($result2 != true) {
        echo "Failed to connect to MySQL2: " . mysqli_connect_error();
    }

    $table_3 = "user";
    $column_3 = "account_number";
    $condition_3 = "$account_number=account_number and types='user'";
    $result3 = select($table_3, $column_3, $condition_3);

    if ($result3 != true) {
        echo "Failed to connect to MySQL3: " . mysqli_connect_error();
    }
    $row3 = mysqli_fetch_array($result3);
    if (is_null($row3['account_number']) == true) {
        $count++;
        $errors['not_found']['error']="Account not found";
        $status="failed";
    }

    while ($row1 = mysqli_fetch_array($result1)) {
        if ($account_number == $row1['account_number']) {
            $count++;
            $errors['not_found']['error']="cannot add your own account";
            $status="failed";
            break;
        }
        while ($row2 = mysqli_fetch_array($result2)) {
            if ($account_number == $row2['account_number']) {
                $count++;
                $errors['not_found']['error']="Account already exist";
                $status="failed";
                break;
            }
        }
    }

//merging status array and errors array in response array
    $response_error['status']=$status;
    $response_error['errors']=$errors;
    $_SESSION['response_error']=$response_error; 
//check if array status is failed redirect to http referer    
if($_SESSION['response_error']['status']=="failed"){
    header("location:../add_benificary_account.php");
    exit;
}
    if ($count == 0) {
        $table_4 = "user";
        $column_4 = "user.id";
        $condition_4 = "user.account_number=$account_number && status='active'";
        $result4 = select($table_4, $column_4, $condition_4);
        if ($result4 != true) {
            echo "Failed to connect to MySQL4: " . mysqli_connect_error();

        }
        $row4 = mysqli_fetch_array($result4);
        $friend_id = $row4['id'];

        $user = "`benificaries`";
        $column = "`user_id`, `friend_id`";
        $values = "'$user_id','$friend_id'";
        if (create($user, $column, $values) != true) {
            echo "Failed to connect to MySQL4: " . mysqli_connect_error();

        }

        $_SESSION['messege_type'] = "success";
        $_SESSION['messege_text'] = "Account Added Successfully";

        header("location:../beneficary.php");
        exit;
    }
//redirect to pages with error messeges
    header("location:../add_benificary_account.php");
    exit;
}
