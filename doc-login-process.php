<?php
include_once("connection.php");

$btn=$_POST["btn"];

if($btn=="Submit"){
    doSubmit($dbcon);
}
else if($btn=="Update"){
    doUpdate($dbcon);
}

function doSubmit($dbcon){
    $uid=$_POST["txtUid"];
    $dname=$_POST["txtName"];
    $contact=$_POST["txtMob"];
    $email=$_POST["txtEmail"];
    $spl=$_POST["txtSpecial"];
    $qual=$_POST["txtQual"];
    $studied=$_POST["txtStudy"];
    $exp=$_POST["txtExp"];
    $website=$_POST["txtWeb"];
    $hospital=$_POST["hospName"];
    $address=$_POST["hospAdd"];
    $city=$_POST["txtCity"];
    $state=$_POST["txtState"];
    $zip=$_POST["txtZip"];
    $ppic=$_FILES["ppic"]["name"];
    $tmpName=$_FILES["ppic"]["tmp_name"];
    move_uploaded_file($tmpName,"uploads/".$ppic);
    $cpic=$_FILES["cpic"]["name"];
    $tmpName2=$_FILES["cpic"]["tmp_name"];
    move_uploaded_file($tmpName2,"uploads/".$cpic);
    $info=$_POST["txtInfo"];

    $query="insert into doctor values('$uid','$dname','$contact','$email','$spl','$qual','$studied','$exp','$website','$hospital','$address','$city','$state','$zip','$ppic','$cpic','$info')";

    mysqli_query($dbcon,$query);

    $msg=mysqli_error($dbcon);

    if($msg=="")
        echo "Data submitted successfully";
    else
        echo $msg;

}
function doUpdate($dbcon){
    $uid=$_POST["txtUid"];
    $dname=$_POST["txtName"];
    $contact=$_POST["txtMob"];
    $email=$_POST["txtEmail"];
    $spl=$_POST["txtSpecial"];
    $qual=$_POST["txtQual"];
    $studied=$_POST["txtStudy"];
    $exp=$_POST["txtExp"];
    $website=$_POST["txtWeb"];
    $hospital=$_POST["hospName"];
    $address=$_POST["hospAdd"];
    $city=$_POST["txtCity"];
    $state=$_POST["txtState"];
    $zip=$_POST["txtZip"];
    $ppic=$_FILES["ppic"]["name"];
    $tmpName=$_FILES["ppic"]["tmp_name"];
    move_uploaded_file($tmpName,"uploads/".$ppic);
    $cpic=$_FILES["cpic"]["name"];
    $tmpName2=$_FILES["cpic"]["tmp_name"];
    move_uploaded_file($tmpName2,"uploads/".$cpic);
    $info=$_POST["txtInfo"];
    $jasus=$_POST["jasus"];
    $jasus2=$_POST["jasus2"];

    if($ppic=="")
	{
		$fileName=$jasus;
	}
	else
	{
		$fileName=$ppic;
		move_uploaded_file($tmpName,"uploads/".$ppic);
	}

    if($cpic=="")
	{
		$fileName2=$jasus2;
	}
	else
	{
		$fileName2=$cpic;
		move_uploaded_file($tmpName,"uploads/".$cpic);
	}

    $query="update doctor set uid='$uid',dname='$dname',contact='$contact',email='$email',spl='$spl',qual='$qual',studied='$studied',exp='$exp',website='$website',hospital='$hospital',address='$address',city='$city',state='$state',zip='$zip',ppic='$fileName',cpic='$fileName2',info='$info' where uid='$uid'";

    mysqli_query($dbcon,$query);

    $msg=mysqli_error($dbcon);

    if($msg=="")
        echo "Data updated successfully";
    else
        echo $msg;
}

?>
