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
if($_POST['password1']==""){
    
    $errors['password1']['error']="Password Required";
    $status="failed";
}

//password validation
if($_POST['password2']==""){
    $errors['password2']['error']="Password Required";
    $status="failed";
}
$response_error['status']=$status;
$response_error['errors']=$errors;
$_SESSION['response_error']=$response_error; 


    if ($_POST['password1'] != $_POST['password2']) {

        $errors['password2']['error']="Password Not matched";
        $status="failed";

    }
    else if ($_POST['password1']  == $_POST['password2']){ 
        $uppercase = preg_match('@[A-Z]@', $_POST['password2']);
        $lowercase = preg_match('@[a-z]@', $_POST['password2']);
        $number =    preg_match('@[0-9]@', $_POST['password2']);

        if (!$uppercase || !$lowercase || !$number || strlen($_POST['password2']) < 8)
        {
            $errors['password2']['error']= "password must contain upper case lower case alphabets and numbers";
            $status="failed";
        }

}
$response_error['status']=$status;
$response_error['errors']=$errors;
$_SESSION['response_error']=$response_error; 

?>