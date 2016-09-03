<?php
if(!isset($_SESSION)){
	session_start();	
}
if($_SESSION['st_id']==""){ //To restrict if you are not loginig as a user
	$msg="Please Login to the System";
	header("Location:../login/index.php?msg=$msg");	
	exit();
}

include("../../common/dbconnection.php");
$gr_name=$_POST['gr_name'];
$gr_description=$_POST['gr_description'];

	$sql="INSERT INTO grade
	VALUES('','$gr_name','$gr_description','Active')"; 

	$result=mysqli_query($con,$sql);
	if($result){
		$msg="<h4 class=alert_success>A grade has been successfuly added...</h4>";
		
	}else{
	    $msg="<h4 class=alert_success>A grade has not been successfuly added...</h4>";

	}
	header("Location:grade.php?msg=$msg");
?>












