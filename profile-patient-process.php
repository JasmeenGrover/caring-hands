<?php

include_once("connection.php");

$btn=$_GET["btn"];

if($btn=="Submit"){
    doSubmit($dbcon);
}
else if($btn=="Update"){
    doUpdate($dbcon);
}

function doSubmit($dbcon){
    $uid=$_GET["txtUid"];
    $name=$_GET["txtName"];
    $contact=$_GET["txtMob"];
    $email=$_GET["txtEmail"];
    $gender=$_GET["txtGender"];
    $age=$_GET["txtAge"];
    $city=$_GET["txtCity"];
    $address=$_GET["txtAdd"];
    $problems=$_GET["txtInfo"];

    $query="insert into patient values('$uid','$name','$contact','$email','$gender','$age','$city','$address','$problems')";

    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);

    if($msg==""){
        header("location:dashboard-patient.php");
    }
    else
        echo $msg;
}
function doUpdate($dbcon){
    $uid=$_GET["txtUid"];
    $name=$_GET["txtName"];
    $contact=$_GET["txtMob"];
    $email=$_GET["txtEmail"];
    $gender=$_GET["txtGender"];
    $age=$_GET["txtAge"];
    $city=$_GET["txtCity"];
    $address=$_GET["txtAdd"];
    $problems=$_GET["txtInfo"];

    $query="update patient set uid='$uid',name='$name',contact='$contact',email='$email',gender='$gender',age='$age',city='$city',address='$address',problems='$problems' where uid='$uid'";

    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);

    if($msg==""){
        echo "Data updated successfully";
    }
    else
        echo $msg;
}
?>
