<!DOCTYPE html>
<html>

<?php include "../layouts/header.php";
include "session_only_admin.php";
include "../assests/js/session_messege.php";
include "../../actions/view_all_accounts.php"; ?>

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
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

                <h4 align="center">All user details</h4>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>gender</th>
                        <th>type</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
while ($row = mysqli_fetch_array($result)) {
    ?>

                        <td>
                            <?php echo $row['first_name'];
    echo " ";
    echo $row['last_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['gender']; ?>
                        </td>
                        <td>
                            <?php echo $row['types']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['phone']; ?>
                        </td>
                        <td>
                            <?php echo $row['status']; ?>
                        </td>

                        <td>
                            <a class="bi bi-trash" href=<?php echo getenv('base_url') ."Actions/delete.php"?>?id=<?php echo $row['id'] ?> title="Delete"></a> |
                            <a class="bi bi-pencil" href=<?php echo getenv('base_url') ."edit.php"?>?id=<?php echo $row['id'] ?> title="Edit"></a> |
                            </a></i>
                            <a class="bi bi-node-plus-fill" href=<?php echo getenv('base_url') ."transaction_admin.php"?>?id=<?php echo $row['id'] ?> title="Add Balance"></a>

                        </td>

                        </tr>

                    <?php }?>

        </table>
        </tr>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
</body>

</html>