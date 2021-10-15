<?php
session_start();
$response_error=array();
session_unset('response_error');
$status="success";
$errors=array();
foreach($_POST as $name=>$val){
  
    $errors[$name]=array(
        "value"=> $val,
        "error"=> ""
);
}
//email validation
if($_POST['first_name']==""){
    
    $errors['first_name']['error']="First Name Required";
    $status="failed";
}
else  {  
        $first_name = test_input(mysqli_real_escape_string($conn, $_POST["first_name"]));
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $first_name)) {
            $errors['first_name']['error']="Only letters allowed";
            $status="failed";
        }
}

//password validation
if($_POST['last_name']==""){
    
    $errors['last_name']['error']="Last Name Required";
    $status="failed";
}
else  {  
        $last_name= test_input(mysqli_real_escape_string($conn,$_POST["last_name"]));
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $last_name)) {
            $errors['last_name']['error']="Only letters allowed";
            $status="failed";
        }
}


if($_POST['gender']==""){
    $errors['gender']['error']="Gender is Required";
    $status="failed";
}



if($_POST['email']=="" || !filter_var(mysqli_real_escape_string($conn, $_POST['email'],FILTER_VALIDATE_EMAIL))){
    $errors['email']['error']="Email is Required";
    $status="failed";
}
   



if($_POST['passwords']==""){
    $errors['passwords']['error']="Password Required";
    $status="failed";

}
else{ 
    $passwords = (mysqli_real_escape_string($conn, $_POST['passwords']));
    $uppercase = preg_match('@[A-Z]@', $passwords);
    $lowercase = preg_match('@[a-z]@', $passwords);
    $number = preg_match('@[0-9]@', $passwords);

    if (!$uppercase || !$lowercase || !$number || strlen($passwords) < 8) {
        $errors['passwords']['error'] = "password must contain upper case lower case alphabets and numbers";
        $status="failed";
    }


}




if($_POST['balance']==""){
    $errors['balance']['error']="Balance Required";
    $status="failed";
}
else if ($_POST["balance"] <= 0) {
    $errors['balance']['error']="Balance should be greater then zero ";
    $status="failed";
    } 
    else {
        $balance = test_input(mysqli_real_escape_string($conn, $_POST["balance"]));
    }



    if($_POST['phone']==""){
        $errors['phone']['error']="Number is Required";
        $status="failed";
    }
        else {
            $balance = test_input(mysqli_real_escape_string($conn, $_POST["balance"]));
        }

$response_error['status']=$status;
$response_error['errors']=$errors;
$_SESSION['response_error']=$response_error; 

?>
