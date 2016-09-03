<?php
include("../../common/dbconnection.php");
$cl_name=$_POST['cl_name'];
$cl_location=$_POST['cl_location'];
$cl_teacher=$_POST['cl_teacher'];
$no_of_students=$_POST['no_of_students'];
$cl_description=$_POST['cl_description'];
$cl_status=$_POST['cl_status'];
$gr_id=$_POST['gr_id'];

$cur_id=$_POST['cur_id'];



	$sql="INSERT INTO class	VALUES('','$cl_name','$cl_location','$cl_teacher','$no_of_students','$cl_description','Active','$gr_id')"; 


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

	$msg="<h4 class=alert_success>A class has been successfuly added...</h4>";
			
			}else{
	    $msg="<h4 class=alert_success>A class has not been successfuly added...</h4>";

			}	
		}

		
	}
	header("Location:class.php?msg=$msg");



?>






