<?php
include_once("connection.php");
$uid=$_GET["uid"];
$dateFrom=$_GET["dateFrom"];
$dateTo=$_GET["dateTo"];
$query="select * from bprecord where uid='$uid' and dateofrecord>='$dateFrom' and dateofrecord<='$dateTo'";
$table=mysqli_query($dbcon,$query);
$ary=array();
while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}
echo json_encode($ary);
?>
