<?php
//Database connection
include("../../common/dbconnection.php");
echo $action=$_GET['action'];
$p_id=$_GET['p_id'];
if($action=="Delete"){
	
	$sql="DELETE FROM parent WHERE p_id='$p_id'";
	$results=mysqli_query($con,$sql);
}
if($action=="Deactivate"){
	$sql="UPDATE parent SET p_status='Deactive' WHERE p_id='$p_id'";
	$results=mysqli_query($con,$sql);
}
if($action=="Activate"){
	$sql="UPDATE parent SET p_status='Active' WHERE p_id='$p_id'";
	$results=mysqli_query($con,$sql);
}

	if($results){
		$msg="<h4 class=alert_success>A parent has been successfuly deleteded...</h4>";
		
	}else{
	    $msg="<h4 class=alert_success>A parent has not been successfuly deleted...</h4>";

	}

header("Location:parent.php?msg=$msg");
?>