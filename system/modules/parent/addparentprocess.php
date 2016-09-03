<?php
include("../../common/dbconnection.php");
$p_title=$_POST['p_title'];
$p_fname=$_POST['p_fname'];
$p_lname=$_POST['p_lname'];
$p_address1=$_POST['p_address1'];
$p_address2=$_POST['p_address2'];
$p_address3=$_POST['p_address3'];
$p_contact_no1=$_POST['p_contact_no1'];
$p_contact_no2=$_POST['p_contact_no2'];
$p_email=$_POST['p_email'];
$p_NIC=$_POST['p_NIC'];
$p_gender=$_POST['p_gender'];
$reg_no=$_POST['reg_no'];
$p_relationship=$_POST['p_relationship'];

//$p=$st_nic;
$pass=sha1($p);
$p_status="Active";
$p_password=$_POST['p_password'];

	$sql="INSERT INTO parent
	VALUES('','$p_title','reg_no','$p_fname','$p_lname','$p_password','$p_gender','$p_relationship','$p_NIC','$p_address1','$p_address2','$p_address3','$p_contact_no1','$p_contact_no2','$p_email','$p_status')"; 

	$results=mysqli_query($con,$sql);
	$st_id=mysqli_insert_id($con);//lastid

	if($results){
		if($_FILES['p_photo'] ['name'] !=""){//if image is there
		  $tmp=$_FILES['p_photo'] ['tmp_name'] ;
		  $newimage=$p_id."_".$_FILES['p_photo'] ['name'] ;//uniquly store data
		  $path="photo/".$newimage;//path
		  copy($tmp,$path);//copy into new path from temp
		}else{
			$newimage="";
		}
		$sqlup="UPDATE parent SET photo= '$newimage' WHERE p_id='$p_id'";
		mysqli_query($con,$sqlup);//update 
	
	header("Location:parent.php?msg=$msg");
		$msg="<h4 class=alert_warning>A Parent Successfully Added!!!</h4>";

	}else{
		die(mysqli_error($con));
	}
	
?>







