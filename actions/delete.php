<?php
include "../actions/session_only_admin.php";

include "../configure/database.php";

include "../dbmodel/dbmodel.php";

$id =mysqli_real_escape_string($conn, $_GET['id']);

$table = "user";
$field['status'] = "inactive";
$condition = "id=$id";
//update query is used because we are setting the status inactive and not actually deleting the account
if (UpdateTable($table, $field, $condition) == true) {

    header("location:view_all_accounts.php");
} else {
    echo "error";
}
