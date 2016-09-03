<?php
include("../../common/dbconnection.php");
$sub_code=$_POST['sub_code'];
$sub_title=$_POST['sub_title'];
$sub_incharge=$_POST['sub_incharge'];
$sub_description=$_POST['sub_description'];
$sub_status=$_POST['sub_status'];
$gr_id=$_POST['gr_id'];
$cur_id=$_POST['cur_id'];



	$sql="INSERT INTO subject VALUES('','$sub_code','$sub_title','$sub_incharge','$sub_description','Active','$gr_id')"; 


	$result=mysqli_query($con,$sql);

//to get curriculum and grade and update
	if($result){

		$sql="select * from grade_curriculum where gr_id='$gr_id' and cur_id='$cur_id'";
		$result=mysqli_query($con,$sql);

		$row=mysqli_fetch_assoc($result);

		if(count($row)==0){

			$sql="INSERT INTO grade_curriculum values('','$gr_id','$cur_id')";
			$result=mysqli_query($con,$sql);

			if($result){

	$msg="<h4 class=alert_success>A subject has been successfuly added...</h4>";
			
			}else{
	    $msg="<h4 class=alert_success>A subject has not been successfuly added...</h4>";

			}	
		}

		
	}
	header("Location:subject.php?msg=$msg");



?>






