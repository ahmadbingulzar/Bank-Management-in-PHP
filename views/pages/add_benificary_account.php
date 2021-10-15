<?php
include "session_only_user.php";
include "../assests/js/session_messege.php";
if($_SESSION['response_error']['errors']['not_found']['error']!="")
{
    $accountErr1=$_SESSION['response_error']['errors']['not_found']['error'];
}
?>
<!DOCTYPE html>

<html>

<?php
include "../layouts/dashboard_user.php";
include "../layouts/header_form.php";
?>
  
<body class="h-100">

    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-lg-6">
                <div class="bg-white rounded-3 shadow px-4 py-5">

                    <h3 class="text-center text-dark fs-4">Mango bank limited</h3>
                    <h2>Add Accounts</h2>


                    <form action=<?php echo getenv('base_url')."actions/add_benificary_account.php"?> method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="accountnumbervalidation" class="form-label">Account number</label>
                            <div class="input-group has-validation">

                                <input id="acccountnumbervalidation" class="form-control" type="number" name="account_number" required size="4">
                                <span class="error"> <?php echo $accountErr1; ?></span>
                                <div class="invalid-feedback">
                                    Please enter valid account number.
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap align-items-center">
                            <input class="btn btn-primary px-4" type="submit" name="submit" value="ADD">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include "../layouts/fotter.php"; ?>


</body>

</html>