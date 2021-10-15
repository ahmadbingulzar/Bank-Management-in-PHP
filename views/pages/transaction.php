<?php
include "transaction_data.php";
include "transaction_session.php";
include "../assests/js/session_messege.php";
if($_SESSION['response_error']['errors']['not_found']['error']!="")
{
  $balanceErr1=$_SESSION['response_error']['errors']['not_found']['error'];
}
?>
<!DOCTYPE html>
<html>
<?php

include "../layouts/header_form.php";
include "../layouts/dashboard_user.php";
$id=$_GET['id'];
?>

<body class="h-100">

  <div class="container h-100">
    <div class="row justify-content-center h-100 align-items-center">
      <div class="col-lg-6">
        <div class="bg-white rounded-3 shadow px-4 py-5">

          <h3 class="text-center text-dark fs-4">Transaction</h3>
          <fieldset disabled>
            <form>
              <div class="mb-3">
                <label class="form-label">First Name</label>
                <input class="form-control" value="<?=$receiver_first_name?>">
              </div>
              <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input class="form-control" value="<?php echo $receiver_last_name; ?>">
              </div>
              <div class="mb-3">
                <label class="form-label">Account Number</label>
                <input class="form-control" value="<?php echo $receiver_account_number; ?>">
              </div>
          </fieldset>
          </form>

          <form action=<?php echo getenv('base_url'). "actions/transaction.php"?>?id=<?php echo $id ?> method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
              <label for="balancerequired" class="form-label">Balance</label>
              <div class="input-group has-validation">
                <input id="balancerequired" class="form-control sr-only" type="number" name="balance" required min="1">
                <div class="invalid-feedback">
                  Please enter valid Balance.
                </div>
              </div>

              <span class="error">
                <?php echo $balanceErr1; ?>
              </span>
              

            </div>

            <div class="d-flex flex-wrap align-items-center">
              <input class="btn btn-primary px-4" type="submit" name="save" value="save">

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <?php include "../layouts/fotter.php"; ?>


</body>

</html>