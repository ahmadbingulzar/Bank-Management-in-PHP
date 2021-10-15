<?php
include "login_session.php";
include "../assests/js/session_messege.php";
$emailError="";
$passwordError="";
if($_SESSION['response_error']['errors']['email']['error']!="" || $_SESSION['response_error']['errors']['passwords']['error']!=""){
    if(isset($_SESSION['response_error']['errors']['email']['error']) && $_SESSION['response_error']['errors']['email']['error']!=""){
        $emailError=$_SESSION['response_error']['errors']['email']['error'];
    }
    if(isset($_SESSION['response_error']['errors']['passwords']['error']) && $_SESSION['response_error']['errors']['passwords']['error']!=""){
        $passwordError=$_SESSION['response_error']['errors']['passwords']['error'];
    }
    $_SESSION['response_error']=array();
    $base_url = $_SERVER['base_url'];
}
?>
<!DOCTYPE html>
<html>
<?php include "../layouts/header_form.php";?>
<body class="h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-lg-6">
                <div class="bg-white rounded-3 shadow px-4 py-5">

                    <h3 class="text-center text-dark fs-4">Mango bank limited</h3>
                    <h2>Login</h2>
                    <form action=<?php echo $base_url."actions/login.php"?>  method="POST" class="needs-validation" novalidate>
                        <div class="mb-3 ">
                            <label for="emailvalidation" class="form-label">Email</label>
                            <div class="input-group has-validation">

                                <input class="form-control" type="email" id="emailvalidation" aria-describedby="emailHelp" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email">
                                <div class="invalid-feedback">
                                    Please choose a email.
                                </div>
                                <span class="error">
                                     <?php if(isset($emailError) && $emailError!="") echo $emailError; ?>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="passwordvalidation" class="form-label">Password</label>
                            <div class="input-group has-validation">

                                <input class="form-control sr-only" id="passwordvalidation" type="password" required name="passwords">
                                <div class="invalid-feedback">
                                    Please enter valid password.
                                </div>
                                        <span class="error">
                                        <?php if(isset($passwordError) && $passwordError!="") echo $passwordError; ?>
                                    </span>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap align-items-center">
                            <input class="btn btn-primary px-4" type="submit" name="login" value="login">
                            </form>
                            <a href="forget_password.php" class="d-inline-block text-dark ms-auto">Forget password</a>

                        </div>



                </div>
            </div>
        </div>
    </div>
    <?php include "../layouts/fotter.php"; ?>
</body>
</html>