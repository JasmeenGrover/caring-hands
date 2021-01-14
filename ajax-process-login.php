<?php
session_start();    
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
include_once("connection.php");

$query="select * from users where uid='$uid' and pwd='$pwd'";
$table=mysqli_query($dbcon,$query);

$msg=mysqli_error($dbcon);

if(mysqli_num_rows($table)==0)
    echo "Fill your data properly";
else if(mysqli_num_rows($table)==1){
    $_SESSION["activeuser"]=$uid;
    $row=mysqli_fetch_array($table);
    echo "Authorized login";
}

/*
if($msg=="")
    echo "Login successful";
else    
    echo $msg;
*/

?>