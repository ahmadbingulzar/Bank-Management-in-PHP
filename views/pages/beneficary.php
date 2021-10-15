<?php
include "session_only_user.php";
include "../../actions/beneficiary.php";
include "../assests/js/session_messege.php";

?>
<!DOCTYPE html>
<html>

<?php
include "../layouts/dashboard_user.php"; 
include "../layouts/header.php"?>
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


                <h4 align="center">All user details</h4>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
                <thead>
                    <tr>
                        <th>Account number</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php
while ($row = mysqli_fetch_array($result)) {
    ?>
                    <td><?php echo $row['account_number']; ?></td>
                    <td><?php echo $row['first_name'];
    echo " ";
    $row['last_name']; ?></td>
                    <td><a href=<?php echo getenv('base_url'). "transaction.php"?>?id=<?php echo $row['id'] ?> class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-share"></span> Share
                            </button>
                    </td>
                    </tr>
                    <tbody>
                    <?php }?>
        </table>
        </tr>

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    </div>
</body>
</html>