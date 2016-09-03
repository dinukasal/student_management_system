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
$sub_id=$_GET['sub_id'];
$sub_code=$_GET['sub_code'];
$sub_title=$_POST['sub_title'];
$sub_incharge=$_POST['sub_incharge'];
$sub_description=$_POST['sub_description'];


$sql="UPDATE subject SET sub_code='$sub_code',sub_title='$sub_title',sub_incharge='$sub_incharge',sub_description='$sub_description' WHERE sub_id='$sub_id'";

$result=mysqli_query($con,$sql);
	if($result){
		$msg="<h4 class=alert_success>A subject has been successfuly updated...</h4>";
		
	}else{
	    $msg="h4 class=alert_success>A subject has not been successfuly updated...</h4>";

	}


	header("Location:subject.php?msg=$msg"); 



?>