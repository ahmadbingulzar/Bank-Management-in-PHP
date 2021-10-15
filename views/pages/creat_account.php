<?php
session_start();
include "actions/session_only_admin.php";
include "../assests/js/session_messege.php";

if($first_nameErr!="" || $last_nameErr!="" || $emailErr!="" || $passwordErr!="" || $phoneErr!="" || $genderErr!="" || $balanceErr !="")
{
        $first_nameErr=null;
        $last_nameErr =null;
        $emailErr     =null;
        $passwordErr  =null;
        $phoneErr     =null;
        $genderErr    =null;
        $balanceErr   =null;

}

if($_SESSION['response_error']['errors']['first_name']['error']!="" ||
$_SESSION['response_error']['errors']['last_name']['error'] !="" ||
$_SESSION['response_error']['errors']['email']['error']!="" ||
$_SESSION['response_error']['errors']['passwords']['error']!="" ||
$_SESSION['response_error']['errors']['phone']['error']    !="" ||
$_SESSION['response_error']['errors']['gender']['error']   !="" ||
$_SESSION['response_error']['errors']['balance']['error']  !="" )
{
    $first_nameErr =$_SESSION['response_error']['errors']['first_name']['error'];
    $last_nameErr  =$_SESSION['response_error']['errors']['last_name']['error'];
    $emailErr      =$_SESSION['response_error']['errors']['email']['error'];
    $passwordErr   =$_SESSION['response_error']['errors']['passwords']['error'];
    $phoneErr      =$_SESSION['response_error']['errors']['phone']['error'];
    $genderErr     =$_SESSION['response_error']['errors']['gender']['error'];
    $balanceErr    =$_SESSION['response_error']['errors']['balance']['error']; 
    
    $first_field =$_SESSION['first_field '] ;
    $second_field=$_SESSION['second_field'] ;
    $third_field =$_SESSION['third_field '] ;
    $fourth_field=$_SESSION['fourth_field'] ;
    $fifth_field =$_SESSION['fifth_field '] ;
    $sixth_field =$_SESSION['sixth_field '] ;
    $seventh_field=$_SESSION['seventh_field'];


    unset($_SESSION['first_field' ]);
    unset($_SESSION['second_field']); 
    unset($_SESSION['third_field ']); 
    unset($_SESSION['fourth_field']); 
    unset($_SESSION['fifth_field ']); 
    unset($_SESSION['sixth_field ']); 
    unset($_SESSION['seventh_field']); 
}

?>
<!DOCTYPE html>
<html>
<?php
include "../layouts/dashboard_admin.php";


include "../layouts/header_form.php";?>
<body class="h-100">
    <script type="text/javascript">
        function Disable_Space() {
            if (event.keyCode == 32) {
                event.returnValue = false;
                return false;
            }
        }
    </script>
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-lg-6">
                <div class="bg-white rounded-3 shadow px-4 py-5">

                    <h6 class="text-center text-dark fs-4">Add Account</h6>


                    <form action=<?php echo getenv('base_url') ."actions/create_account.php"?> method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="firstnamevalidation" class="form-label">First Name</label>
                            <div class="input-group has-validation">

                                <input id="firstnamevalidation" class="form-control" type="fname" name="first_name" value="<?php echo $first_field ?>"
                                    autocomplete="off" required>
                                <div class="invalid-feedback">
                                    Please enter valid name.
                                </div>
                            </div>
                            <span class="error">
                                <?php echo $first_nameErr; ?>
                            </span>
                        </div>



                        <div class="mb-3">
                            <label for="lastnamevalidation" class="form-label">Last Name</label>
                            <div class="input-group has-validation">

                                <input id="lastnamevalidation" class="form-control" type="text" name="last_name" value="<?php echo $second_field ?>"
                                    autocomplete="off" required>
                                <div class="invalid-feedback">
                                    Please enter valid name.
                                </div>
                            </div>
                            <span class="error">
                                <?php echo $last_nameErr; ?>
                            </span>
                        </div>






                        <div class="mb-3">
                            <label for="gendervalidation" class="form-label">Gender</label>
                            <div class="input-group has-validation">

                                <input id="gendervalidation" type="radio" name="gender" value="male" required>Male
                                <input id="gendervalidation" type="radio" name="gender" value="male" required>Female
                                <div class="invalid-feedback">
                                    Please choose Gender.
                                </div>
                            </div>
                            <span class="error">
                                <?php echo $genderErr; ?>
                            </span>


                        </div>




                        <div class="mb-3">
                            <label for="emailvalidation" class="form-label">Email</label>
                            <div class="input-group has-validation">

                                <input id="emailvalidation" class="form-control" type="email" name="email" value="<?php echo $fourth_field ?>"
                                    autocomplete="off" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                <div class="invalid-feedback">
                                    Please enter valid email.
                                </div>
                            </div>
                            <span class="error">
                                <?php echo $emailErr; ?>
                            </span>
                            <span class="error">
                                <?php echo $email_userErr2; ?>
                            </span>

                        </div>

                        <div class="mb-3">
                            <label for="passwordvalidation" class="form-label">Password</label>
                            <div class="input-group has-validation">
                                <input id="passwordvalidation" class="form-control" type="password" name="passwords"
                                    autocomplete="off" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    placeholder="" min="2"
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                <div class="invalid-feedback">
                                    Please enter valid password.
                                </div>
                            </div>
                            <span class="error">
                                <?php echo $passwordErr; ?>
                            </span>
                        </div>



                        <div class="mb-3">
                            <label for="phonevalidation" class="form-label">Phone</label>
                            <div class="input-group has-validation">

                                <input id="phonevalidation" class="form-control" type="number" name="phone" value="<?php echo $sixth_field ?>"
                                    autocomplete="off" required min="11">
                                <div class="invalid-feedback">
                                    Please enter valid number (11 digits).
                                </div>
                            </div>
                            <span class="error">
                                <?php echo $phoneErr; ?>
                            </span>

                        </div>

                        <div class="mb-3">
                            <label for="balancevalidation" class="form-label">Balance</label>
                            <div class="input-group has-validation">

                                <input id="balancevalidation" class="form-control" type="number" name="balance" value="<?php echo $seventh_field ?>"
                                    autocomplete="off" required min="1">
                                <div class="invalid-feedback">
                                    Please enter valid balance.
                                </div>
                            </div>
                            <span class="error">
                                <?php echo $balanceErr; ?>
                            </span>
                        </div>



                        <div class="d-flex flex-wrap align-items-center">
                            <input class="btn btn-primary px-4" type="submit" name="submit" value="Add Account">

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "../layouts/fotter.php"; ?>

</body>

</html>