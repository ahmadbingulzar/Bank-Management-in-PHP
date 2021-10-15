<?php
session_start();
$response_error=array();
session_unset('response_error');
$status="success";
$errors=array();
foreach($_POST as $name=>$val){
  mysqli_real_escape_string($conn,$val);
    $errors[$name]=array(
        "value"=> $val,
        "error"=> ""
);
}
//email validation
if($_POST['email']==""){
    
    $errors['email']['error']="Email Required";
    $status="failed";
}

//password validation
if($_POST['passwords']==""){
    $errors['passwords']['error']="Password Required";
    $status="failed";
}
$response_error['status']=$status;
$response_error['errors']=$errors;
$_SESSION['response_error']=$response_error; 

?>
