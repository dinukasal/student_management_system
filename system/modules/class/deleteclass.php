
<?php
//Database connection
include("../../common/dbconnection.php");
echo $action=$_GET['action'];
$st_id=$_GET['st_id'];
$cl_id=$_GET['cl_id'];

if($action=="Delete"){
	
	$sql="DELETE FROM class WHERE cl_id='$cl_id'";
	$result=mysqli_query($con,$sql);
}
if($action=="Deactivate"){
	$sql="UPDATE class SET cl_status='Deactive' WHERE cl_id='$cl_id'";
	$result=mysqli_query($con,$sql);
}
if($action=="Activate"){
	$sql="UPDATE class SET cl_status='Active' WHERE cl_id='$cl_id'";
	$result=mysqli_query($con,$sql);
}

if($result){
		$msg="<h4 class=alert_success>A curriculum has been successfuly deleteded...</h4>";
		
	}else{
	    $msg="<h4 class=alert_success>A curriculum has not been successfuly deleted...</h4>";

	}
header("Location:class.php?msg=$msg");
?>