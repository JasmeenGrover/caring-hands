<?php
include_once("connection.php");
$uid=$_GET["uid"];
$dateofrecord=$_GET["dateofrecord"];
$timeofrecord=$_GET["timeofrecord"];
$sugartime=$_GET["sugartime"];
$age=$_GET["age"];
$sugarresult=$_GET["sugarresult"];
$medintake=$_GET["medintake"];
$urineresult=$_GET["urineresult"];


$query="insert into sugarrecord values('$uid','$dateofrecord','$timeofrecord','$sugartime','$age','$sugarresult','$medintake','$urineresult')";

mysqli_query($dbcon,$query);

$msg=mysqli_error($dbcon);

if($msg==""){
    echo "Record saved successfully";
}
    
else
    echo $msg;
    
?>