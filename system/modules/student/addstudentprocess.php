<?php

if(!isset($_SESSION)){
	session_start();
}

include("../../common/dbconnection.php");

//$s_id=$_SESSION['s_id'];
//$cl_id=$_SESSION['cl_id'];
$s_fname=$_SESSION['s_fname']; 
$s_lname=$_SESSION['s_lname']; 
$s_address1=$_SESSION['s_address1'];
$s_address2=$_SESSION['s_address2'];
$s_address3=$_SESSION['s_address3'];
$s_contact_no1=$_SESSION['s_contact_no1'];
$s_contact_no2=$_SESSION['s_contact_no2'];
$s_email=$_SESSION['s_email'];
$s_NIC=$_SESSION['s_NIC'];
$s_DoB=$_SESSION['s_DoB'];
$s_gender=$_SESSION['s_gender'];
//$pass=sha1($p);
$s_status="Active";
$s_password=$_SESSION['password'];
$s_uname=$_SESSION['s_uname'];

$cur_id=$_POST['cur_id'];
$year=$_POST['year'];
$gr_id=$_POST['gr_id'];
$cl_id=$_POST['cl_id'];
$date=$_POST['date'];
	
$batch_id=0;	// these two variables have to be updated after getting the batch and parent's id
$p_id=0;


	if($year< date('Y')){	//if the batch year entered is grater than current year batch is inactive otherwise batch is active
		$status='Active';
	}else{
		$status='Inactive';
	}


	// insert data to batch

	//if($results){

		$sql="select batch_id from batch b WHERE gr_id='$gr_id'";
		$results=mysqli_query($con,$sql);

		$row=mysqli_fetch_assoc($results);

		if(count($row)==0){

			$sql="INSERT INTO batch values('','$gr_id','$year','$status')";
			$results=mysqli_query($con,$sql);

			$sql="select batch_id from batch b WHERE gr_id='$gr_id'";
			$results=mysqli_query($con,$sql);

			$row=mysqli_fetch_assoc($results);

		}

	$batch_id=$row['batch_id'];

	//}


	//insert data to parents table

	$sql="";

		//var_dump($_POST);

		var_dump($_SESSION);

	// insert into students table

		$sql="select s_id from student where s_fname='$s_fname' and s_lname='$s_lname'";

	$result1=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result1);

	if(count($row)>0){
		echo "student is in the database<br>";
	}else{
		$sql="INSERT INTO student VALUES('','$s_fname','$s_lname','','$s_uname','$s_password','$s_address1','$s_address2','$s_address3','$s_contact_no1','$s_contact_no2','$s_email','$s_NIC','$s_DoB','$s_gender','$s_status','$batch_id','$p_id')"; 
		
		$result1=mysqli_query($con,$sql);
		$s_id=mysqli_insert_id($con);//lastid

		if($result1 && count($_SESSION['files_st'])>0){
			$_FILES=$_SESSION['files_st'];
			if($_FILES['s_photo'] ['name'] !=""){//if image is there
			  $tmp=$_FILES['s_photo'] ['tmp_name'] ;
			  $newimage=$s_id."_".$_FILES['s_photo'] ['name'] ;//uniquly store data
			  $path="photo/".$newimage;//path
			  copy($tmp,$path);//copy into new path from temp
			}else{
				$newimage="";
			}

			$sqlup="UPDATE student SET photo= '$newimage' WHERE s_id='$s_id'";
			mysqli_query($con,$sqlup);//update 
		
		}

			// get s_id from the student table
			$sql="select s_id from student where s_fname='$s_fname' and s_lname='$s_lname'";

			$results=mysqli_query($con,$sql);

			$row=mysqli_fetch_assoc($results);
	}
	$s_id=$row['s_id'];

	// insert data to 	registration
	global $reg_no;

	if($result1){
		$sql="select reg_no from registration WHERE s_id=$s_id";

		$results=mysqli_query($con,$sql);

		$row=mysqli_fetch_assoc($results);

		if(count($row)==0){
			$sql="INSERT INTO registration values('','$date','Active','$s_id')";
			$results=mysqli_query($con,$sql);
			var_dump($results)	;

			$sql="select reg_no from registration WHERE s_id=$s_id";

			$results=mysqli_query($con,$sql);

			$row=mysqli_fetch_assoc($results);
			$reg_no=$row['reg_no'];
		}
		$reg_no=$row['reg_no'];

	}


	

// insert data to 	reg_batch
	
	if($results){
		$sql="select * from reg_batch where reg_no='$reg_no' and batch_id='$batch_id'";
		echo $sql;
		$results=mysqli_query($con,$sql);

		$row=mysqli_fetch_assoc($results);

		if(count($row)==0){

			$sql="INSERT INTO reg_batch values('','$reg_no','$batch_id')";
			$results=mysqli_query($con,$sql);
		}else{

		}

	


		if($results){

			$msg="<h4 class=alert_success>A student has been successfuly added...</h4>";
			
		}else{
		    $msg="<h4 class=alert_success>A student has not been successfuly added...</h4>";

		}	
		}

		
	
	//header("Location:student.php?msg=$msg");



?>
