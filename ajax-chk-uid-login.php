<?php

include_once("connection.php");

$uid=$_GET["uid"];

$query="select * from users where uid ='$uid' ";
$table=mysqli_query($dbcon,$query);

if(mysqli_num_rows($table)==0)
    echo "Unauthorized login";
else if(mysqli_num_rows($table)==1){
    $row=mysqli_fetch_array($table);
    echo "Authorized login (You are a ".$row["category"].")";
}

?>