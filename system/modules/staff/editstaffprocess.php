<?php
require_once("../../common/dbconnection.php");
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


$st_id=$_GET['st_id'];

$sql="UPDATE staff 
SET st_title='$st_title',st_fname='$st_fname',st_lname='$st_lname',st_address1='$st_address1',st_address2='$st_address2',st_address3='$st_address3',st_contact_no1='$st_contact_no1',st_contact_no2='$st_contact_no2',st_email='$st_email',st_nic='$st_nic',st_dob='$st_dob',st_gender='$st_gender',st_city='$st_city',district_id='$district_id',st_status='$st_status',st_r_id='$st_r_id' WHERE st_id='$st_id'";
	


$result=mysqli_query($con,$sql);
	//header("Location:staff.php?msg=$msg");
		$msg="<h4 class=alert_warning>Staff Member Successfully Updated!!!</h4>";

	if($result){
		if($_FILES['st_photo'] ['name'] !=""){//if image is there
		  $tmp=$_FILES['st_photo'] ['tmp_name'] ;
		  $newimage=$staff_id."_".$_FILES['st_photo'] ['name'] ;//uniquly store data
		  $path="photo/".$newimage;//path
		  copy($tmp,$path);//copy into new path from temp
		  $sqlup="UPDATE staff SET photo= '$newimage' WHERE st_id='$st_id'";
		mysqli_query($con,$sqlup);//update 
		}
		
	

	}else{
		die(mysqli_error($con));
	}
	
header("Location:staff.php?msg=$msg");


?>