<?php
include_once("connection.php");
$uid=$_GET["uid"];
$dateofrecord=$_GET["dateofrecord"];
$sys=$_GET["sys"];
$dia=$_GET["dia"];
$pulse=$_GET["pulse"];

$query="insert into bprecord values('$uid','$dateofrecord','$sys','$dia','$pulse')";
mysqli_query($dbcon,$query);

$msg=mysqli_error($dbcon);

if($msg=="")
    echo "Record saved successfully";
else
    echo $msg;




?>
