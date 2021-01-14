<?php
include_once("connection.php");

$patientid=$_POST["patUid"];
$doctorname=$_POST["docName"];
$dovisit=$_POST["dov"];
$city=$_POST["txtCity"];
$hospital=$_POST["hospName"];
$nextdov=$_POST["nextDov"];
$problem=$_POST["txtProblem"];
$discussion=$_POST["disDoc"];
$slippic=$_FILES["sPic"]["name"];
$tmpName=$_FILES["sPic"]["tmp_name"];
move_uploaded_file($tmpName,"uploads/".$slippic);

$query="insert into slips values ('0','$patientid','$doctorname','$dovisit','$city','$hospital','$nextdov','$problem','$discussion','$slippic')";

mysqli_query($dbcon,$query);

$msg=mysqli_error($dbcon);

if($msg=="")
    echo "Data submitted successfully";
else
    $msg;

?>