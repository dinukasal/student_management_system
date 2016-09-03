<?php
//Database connection
include("../../common/dbconnection.php");
echo $action=$_GET['action'];
$gr_id=$_GET['gr_id'];
if($action=="Delete"){
	
	$sql="DELETE FROM grade WHERE gr_id='$gr_id'";
	$results=mysqli_query($con,$sql);
}
if($action=="Deactivate"){
	$sql="UPDATE grade SET gr_status='Deactive' WHERE gr_id='$gr_id'";
	$results=mysqli_query($con,$sql);
}
if($action=="Activate"){
	$sql="UPDATE grade SET gr_status='Active' WHERE gr_id='$gr_id'";
	$results=mysqli_query($con,$sql);
}
	if($results){
		$msg="<h4 class=alert_success>A grade has been successfuly deleteded...</h4>";
		
	}else{
	    $msg="<h4 class=alert_success>A grade has not been successfuly deleted...</h4>";

	}
	header("Location:grade.php?msg=$msg");
?>




