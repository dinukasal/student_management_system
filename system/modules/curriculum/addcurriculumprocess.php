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
$cur_name=$_POST['cur_name'];
$gr_start=$_POST['gr_start'];
$gr_end=$_POST['gr_end'];
$cur_description=$_POST['cur_description'];

	$sql="INSERT INTO curriculum 
	VALUES('','$cur_name','$gr_start','$gr_end','$cur_description','Active')"; 

	$result=mysqli_query($con,$sql);
	if($result){
		$msg="<h4 class=alert_success>A curriculum has been successfuly added...</h4>";
		
	}else{
	    $msg="<h4 class=alert_success>A curriculum has not been successfuly added...</h4>";

	}
	header("Location:curriculum.php?msg=$msg");
?>






