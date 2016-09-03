<?php
//Database connection
include("../../common/dbconnection.php");
echo $action=$_GET['action'];
$st_id=$_GET['st_id'];
if($action=="Delete"){
	
	$sql="DELETE FROM staff WHERE st_id='$st_id'";
	$results=mysqli_query($con,$sql);
}
if($action=="Deactivate"){
	$sql="UPDATE staff SET st_status='Deactive' WHERE st_id='$st_id'";
	$results=mysqli_query($con,$sql);
}
if($action=="Activate"){
	$sql="UPDATE staff SET st_status='Active' WHERE st_id='$st_id'";
	$results=mysqli_query($con,$sql);
}
	if($results){
		$msg="<h4 class=alert_success>A staff member has been successfuly deleteded...</h4>";
		
	}else{
	    $msg="<h4 class=alert_success>A staff member has not been successfuly deleted...</h4>";

	}
	header("Location:staff.php?msg=$msg");
?>




