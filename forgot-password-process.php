<?php
include_once("connection.php");
include_once("SMS_OK_sms.php");
$uid=$_GET["uid"];
$query="select * from users where uid='$uid'";
$table=mysqli_query($dbcon,$query);
$row=mysqli_fetch_array($table);
if(mysqli_num_rows($table)==0)
    echo("This User ID is not registered with us");
else{
    $resp=SENDSMS($row["mob"],"Password : ".$row["pwd"]);
    echo "Password is sent to your registered mobile number";
}
?>