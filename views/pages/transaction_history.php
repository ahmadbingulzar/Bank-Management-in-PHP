<?php
include "session_only_user.php";
include "../assests/js/session_messege.php";
include "../../actions/transaction_history.php";
?>
<!DOCTYPE html>
<html>
<?php 
include "../layouts/dashboard_user.php";
include "../layouts/header.php" ?>
<body>
    <div class="container">
        <table class="table table-fluid" id="myTable">
            <style>
                table,
                th,
                td {
                    border: 1px solid black;
                }
            </style>
            </style>
            </head>

            <body style="background-color:#C0C0C0;">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">



                <h4 align="center">Transaction Details</h4>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Created Date</th>
                        <th>Type</th>



                    </tr>
                </thead>

                <?php
while ($row = mysqli_fetch_array($result)) {
    ?>
                    <td>
                        <?php echo "Rs:";
    echo $row['amount']; ?>
                    </td>
                    <td>
                        <?php echo $row['created_date']; ?>
                    </td>
                    <td>Credited</td>

                    </tr>
                    <?php
while ($row2 = mysqli_fetch_array($result2)) {?>

                        <td>
                            <?php echo "Rs:";
        echo $row2['amount']; ?>
                        </td>
                        <td>
                            <?php echo $row2['created_date']; ?>
                        </td>
                        <td>Debited</td>

                        </tr>
                        <tbody>
                    <?php }
}?>
        </table>
        </tr>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>

</body>

</html>