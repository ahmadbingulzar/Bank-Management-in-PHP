<?php
 $responce=array();
 $error="Enter valid Email";

function test_input($data)
{
  session_start();
    if (empty($data))
     {
        $_SESSION['empty_email'] = "Enter valid email";
        return false;
     }
    if(!filter_var($data,FILTER_VALIDATE_EMAIL)) {
        $_SESSION['empty_email']="Enter valid email";
        return false;
    }
    else
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return true;
  }
}

function test_input_password($data)
{

  session_start();
  if (empty($data)) {
      $_SESSION['empty_password']="Enter valid password" ;
      return false;
  }
  else{ 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return true;
  }

}
