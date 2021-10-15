<?php

function create($table, $column, $values)
{
    include "../configure/database.php";

    $create_query = "insert into $table($column)
    values($values)";
    $result = mysqli_query($conn, $create_query);
    if ($result != true) {
        return false;
    } else {
        return true;
    }

}
function UpdateTable($table, &$fields, $condition)
{
    include "../configure/database.php";

    $sql = "update $table set ";
    foreach ($fields as $key => $value) {
        $fields[$key] = " `$key` = '" . mysqli_real_escape_string($conn, $value) . "' ";
    }
    $sql .= implode(" , ", array_values($fields)) . " where " . $condition . ";";
    $fields = array();
    $result = mysqli_query($conn, $sql);
    if ($result != true) {
        return false;
    } else {
        return true;
    }

}

function delete($table, $condition)
{
    include "../configure/database.php";
    $sql = "Delete from $table where '$condition' ";
    $result = mysqli_query($conn, $sql);
    if ($result != true) {
        return false;
    } else {
        return true;
    }

}

function select($table, $column, $where)
{
    include "../configure/database.php";
    $sql = "select $column from $table where $where ";
    $result = mysqli_query($conn, $sql);
    if ($result != true) {
        return false;
    } 
    else {
        return $result;
    }

    
}
