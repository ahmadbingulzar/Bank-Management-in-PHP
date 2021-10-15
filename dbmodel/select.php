<?php 
function select_complex($table_1,$table_2,$column,$condition,$join,$order_by){
include "../../configure/database.php";

if($order_by==""){ 
$sql="select $column from $table_1 $join $table_2 where $condition";
$result=mysqli_query($conn,$sql);
if($result!=true)
{
    echo "not working1";
}
else
    return $result;

}

else 
{ 
    $sql="select $column from $table_1 $join $table_2 where $condition order by $order_by";
    $result=mysqli_query($conn,$sql);
    if($result!=true)
    {
        echo "not working3";
    }
    else
    { 
        return $result;
    }
}



}

?>