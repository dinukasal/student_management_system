<?php
//Database connection
include("../../common/dbconnection.php");
echo $action=$_GET['action'];
$s_id=$_GET['s_id'];
if($action=="Delete"){
	
	$sql="DELETE FROM student WHERE s_id='$s_id'";
	$results=mysqli_query($con,$sql);
}
if($action=="Deactivate"){
	$sql="UPDATE student SET s_status='Deactive' WHERE s_id='$s_id'";
	$results=mysqli_query($con,$sql);
}
if($action=="Activate"){
	$sql="UPDATE student SET s_status='Active' WHERE s_id='$s_id'";
	$results=mysqli_query($con,$sql);
}
	if($results){
		$msg="<h4 class=alert_success>A student has been successfuly deleteded...</h4>";
		
	}else{
	    $msg="<h4 class=alert_success>A student has not been successfuly deleted...</h4>";

	}
	header("Location:student.php?msg=$msg");
?>




