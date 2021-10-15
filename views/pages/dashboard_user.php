<?php
include "../../actions/dashboard_user.php";
include "session_only_user.php";
include "../assests/js/session_messege.php";
?>

<!DOCTYPE html>
<html>

<?php 
include "../layouts/dashboard_user.php";
include "../layouts/header.php"?>

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
                        <a href="add_benificary_account.php" class="d-inline-block text-dark ms-auto"> <button
                                align="center">Add Beneficiary</button>
                        </a>
                        <a href="beneficary.php" class="d-inline-block text-dark ms-auto"> <button
                                align="center">Transfer Funds</button>
                        </a>
                        <a href="transaction_history.php" class="d-inline-block text-dark ms-auto"> <button
                                align="center">Transaction history</button>
                        </a>
                        <a href="logout.php" class="d-inline-block text-dark ms-auto"><button>Logout</button></a>
                        <a class="d-inline-block text-dark ms-auto">Total Balance=Rs:
                            <?php echo $actual_balance; ?><br>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../layouts/fotter.php"; ?>
</body>
</html>