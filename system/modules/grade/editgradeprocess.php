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
$gr_id=$_GET['gr_id'];
$gr_name=$_POST['gr_name'];
$gr_description=$_POST['gr_description'];

$sql="UPDATE grade SET gr_name='$gr_name',gr_description='$gr_description' WHERE gr_id='$gr_id'";

$result=mysqli_query($con,$sql);
	if($result){
		$msg="<h4 class=alert_success>A grade has been successfuly updated...</h4>";
		
	}else{
	    $msg="h4 class=alert_success>A grade has not been successfuly updated...</h4>";

	}


	header("Location:grade.php?msg=$msg"); 



?>