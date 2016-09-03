<?php
$st_email=$_GET['q'];
//Database connection
require_once("../../common/dbconnection.php");
$sql="SELECT * FROM staff WHERE st_email='$st_email'";
$results=mysqli_query($con,$sql);
$nor=mysqli_num_rows($results);


// if u want only one validation as existing $msg=""; here
if(preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',$st_email)){
	// to validate using php- server side validation

  if($nor>0){
	$msg="<i class='alert-danger'>Existing Email!</i>"; // check whether it is there in the db
  }else{
	$msg=" <i class='alert-success'>Not Existing Email...</i>";
	  
  }


}else{
	$msg= "<i class='alert-danger'>Invalid Email!</i>";


}
echo $msg;

?>