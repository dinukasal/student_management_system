<?php
if(!isset($_SESSION)){
	session_start();	
}
if($_SESSION['st_id']==""){ //To restrict if you are not loginig as a user
	$msg="Please Login to the System";
	header("Location:../login/index.php?msg=$msg");	
	exit();
}
//To include dbconnection
include("../../common/dbconnection.php");
$cl_id=$_GET['cl_id'];
$cl_name=$_POST['cl_name'];
$cl_location=$_POST['cl_location'];
$cl_teacher=$_POST['cl_teacher'];
$no_of_students=$_POST['no_of_students'];
$cl_description=$_POST['cl_description'];


$sql="UPDATE class SET cl_name='$cl_name',cl_location='$cl_location',cl_teacher='$cl_teacher',no_of_students='$no_of_students',cl_description='$cl_description' WHERE cl_id='$cl_id'";

$result=mysqli_query($con,$sql);
	if($result){
		$msg="<h4 class=alert_success>A class has been successfuly updated...</h4>";
		
	}else{
	    $msg="h4 class=alert_success>A class has not been successfuly updated...</h4>";

	}


	header("Location:class.php?msg=$msg"); 



?>