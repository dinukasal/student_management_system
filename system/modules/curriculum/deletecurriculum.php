<?php
//Database connection
include("../../common/dbconnection.php");
echo $action=$_GET['action'];
$cur_id=$_GET['cur_id'];
if($action=="Delete"){
	
	$sql="DELETE FROM curriculum WHERE cur_id='$cur_id'";
	$results=mysqli_query($con,$sql);
}
if($action=="Deactivate"){
	$sql="UPDATE curriculum SET cur_status='Deactive' WHERE cur_id='$cur_id'";
	$results=mysqli_query($con,$sql);
}
if($action=="Activate"){
	$sql="UPDATE curriculum SET cur_status='Active' WHERE cur_id='$cur_id'";
	$results=mysqli_query($con,$sql);
}
	if($results){
		$msg="<h4 class=alert_success>A curriculum has been successfuly deleteded...</h4>";
		
	}else{
	    $msg="<h4 class=alert_success>A curriculum has not been successfuly deleted...</h4>";

	}
	header("Location:curriculum.php?msg=$msg");
?>




