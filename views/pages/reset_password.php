<?php
include "session_reset_password.php"; 
include "../assests/js/session_messege.php";

if ($_SESSION['response_error']['errors']['password2']['error']!="" || $_SESSION['response_error']['errors']['password1']['error']!="")
{
    $passwordErr1=$_SESSION['response_error']['errors']['password1']['error'];
    $passwordErr2=$_SESSION['response_error']['errors']['password2']['error'];

}
if(isset($_SESSION['response_error']['errors']['password2']['error']) && $_SESSION['response_error']['errors']['password1']['error']!=""){
    $passwordErr1=$_SESSION['response_error']['errors']['password1']['error'];
    $passwordErr2=$_SESSION['response_error']['errors']['password2']['error'];

}
$_SESSION['response_error']=array();

?>
<!DOCTYPE html>
<html>
<head>
    
<?php
include "../layouts/header_form.php";
?>

<body class="h-100">

    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-lg-6">
                <div class="bg-white rounded-3 shadow px-4 py-5">

                    <h3 class="text-center text-dark fs-4">Mango bank limited</h3>
                    <h2>Reset password</h2>


                    <form action=<?php echo getenv('base_url')."actions/reset_password.php"?> method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="passwordvalidation" class="form-label">New Password</label>
                            <div class="input-group has-validation">

                                <input class="form-control sr-only" id="passwordvalidation" type="password" required
                                    name="password1" min="2">
                                <div class="invalid-feedback">
                                    Please enter valid password.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="passwordvalidation" class="form-label">confirmPassword</label>
                            <div class="input-group has-validation">

                                <input class="form-control sr-only" id="passwordvalidation" type="password" required
                                    name="password2" min="2">
                                <div class="invalid-feedback">
                                    Please enter valid password.
                                </div>
                            </div>
                            <span class="error">
                                <?php echo $passwordErr2; ?>
                            </span>
                            <span class="error">
                                <?php echo $passwordErr1; ?>
                            </span>


                        </div>
                        <div class="d-flex flex-wrap align-items-center">
                            <input class="btn btn-primary px-4" type="submit" name="pass" value="Reset Password">


                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "../layouts/fotter.php"; ?>


</body>

</html>