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
$cur_id=$_GET['cur_id'];
$cur_name=$_POST['cur_name'];
$gr_start=$_POST['gr_start'];
$gr_end=$_POST['gr_end'];
$cur_description=$_POST['cur_description'];

$sql="UPDATE curriculum SET cur_name='$cur_name',gr_start='$gr_start',gr_end='$gr_end',cur_description='$cur_description' WHERE cur_id='$cur_id'";

$result=mysqli_query($con,$sql);
	if($result){
		$msg="<h4 class=alert_success>A curriculum has been successfuly updated...</h4>";
		
	}else{
	    $msg="<h4 class=alert_success>A curriculum has not been successfuly updated...</h4>";

	}


	header("Location:curriculum.php?msg=$msg"); 



?>