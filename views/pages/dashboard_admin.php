
<!DOCTYPE html>

<html>

<?php 
include "session_dashboard.php";
if(time()-$_SESSION["login_time_stamp"] >60) 
{
    session_unset();
    session_destroy();
    header("Location:login.php");
}
include "../layouts/header_form.php";
include "../assests/js/session_messege.php";

?>
<body class="h-100" style="background-color:#171717">

    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-lg-6">
                <div class="bg-white rounded-3 shadow px-4 py-5">

                    <h3 class="text-center text-dark fs-4">Mango bank limited</h3>
                    <h2 align="center">Welcome
                        <?=$user?>
                    </h2>

                    <div class="d-flex flex-wrap align-items-center">
                        <a href="view_all_accounts.php" class="d-inline-block text-dark ms-auto"> <button
                                align="center">View all Accounts</button>
                        </a>
                        <a href="creat_account.php" class="d-inline-block text-dark ms-auto"> <button
                                align="center">Create Account</button>
                        </a>
                        <a href="logout.php" class="d-inline-block text-dark ms-auto"><button>Logout</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../layouts/fotter.php"; ?>
</body>

</html>