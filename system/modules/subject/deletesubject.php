<?php
//Database connection
include("../../common/dbconnection.php");
echo $action=$_GET['action'];
$sub_id=$_GET['sub_id'];
if($action=="Delete"){
	
	$sql="DELETE FROM subject WHERE sub_id='$sub_id'";
	$results=mysqli_query($con,$sql);
}
if($action=="Deactivate"){
	$sql="UPDATE subject SET cur_status='Deactive' WHERE sub_id='$sub_id'";
	$results=mysqli_query($con,$sql);
}
if($action=="Activate"){
	$sql="UPDATE subject SET cur_status='Active' WHERE sub_id='$sub_id'";
	$results=mysqli_query($con,$sql);
}
	if($results){
		$msg="<h4 class=alert_success>A subject has been successfuly deleteded...</h4>";
		
	}else{
	    $msg="<h4 class=alert_success>A subject has not been successfuly deleted...</h4>";

	}
	header("Location:subject.php?msg=$msg");
?>




