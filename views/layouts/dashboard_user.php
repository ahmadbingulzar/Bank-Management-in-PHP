<nav class="navbar navbar-light bg-warning mb-3">
  <div class="container-fluid justify-content-center">
    <span class="navbar-brand mb-0 h1">Mango Bank Limited</span>
  </div>
  <div>
    <a class="btn btn-dark justify-content-left mr-3" href="dashboard_user.php">Home</a>
    <a class="btn btn-dark justify-content-left mr-3" href="add_benificary_account.php">Add benificaries</a>
    <a class="btn btn-dark justify-content-left mr-3" href="beneficary.php">Transfer Funds</a>
    <a class="btn btn-dark justify-content-left mr-3" href="transaction_history.php">Transaction history</a>
    <?php echo "Total balance="; echo $_SESSION['actual_balance'] ; ?> 

  </div>

  <a class="btn btn-dark justify-content-right mr-15" href="logout.php">Logout</a>


  </div>
</nav>


