<?php
include("../../common/dbconnection.php");
$st_title=$_POST['st_title'];
$st_fname=$_POST['st_fname'];
$st_lname=$_POST['st_lname'];
$st_address1=$_POST['st_address1'];
$st_address2=$_POST['st_address2'];
$st_address3=$_POST['st_address3'];
$st_contact_no1=$_POST['st_contact_no1'];
$st_contact_no2=$_POST['st_contact_no2'];
$st_email=$_POST['st_email'];
$st_nic=$_POST['st_nic'];
$st_city=$_POST['st_city'];
$district_id=$_POST['district_id'];
$st_dob=$_POST['st_dob'];
$st_gender=$_POST['st_gender'];
$st_r_id=$_POST['st_r_id'];
$st_status="Active";
$pass=$_POST['st_password'];
$st_password=sha1($pass);


	$sql="INSERT INTO staff 
	VALUES('','$st_title','$st_fname','$st_lname','','$st_password','$st_address1','$st_address2','$st_address3','$st_contact_no1','$st_contact_no2','$st_email','$st_nic','$st_dob','$st_gender','$st_city','$district_id','$st_status','$st_r_id')"; 

	$results=mysqli_query($con,$sql);
	$st_id=mysqli_insert_id($con);//lastid

	if($results){
		if($_FILES['st_photo'] ['name'] !=""){//if image is there
		  $tmp=$_FILES['st_photo'] ['tmp_name'] ;
		  $newimage=$st_id."_".$_FILES['st_photo'] ['name'] ;//uniquly store data
		  $path="photo/".$newimage;//path
		  copy($tmp,$path);//copy into new path from temp
		}else{
			$newimage="";
		}
		$sqlup="UPDATE staff SET photo= '$newimage' WHERE st_id='$st_id'";
		mysqli_query($con,$sqlup);//update 
	
		$msg="<h4 class=alert_warning>A Staff Member has been Successfully Added!!!</h4>";

	}else{
	    $msg="h4 class=alert_success>A Staff member has not been successfuly added...</h4>";
	}
	header("Location:staff.php?msg=$msg");
?>







