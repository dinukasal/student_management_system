<?php
if(!isset($_SESSION)){
	session_start();
}

$email=$_POST['uname'];// get data
$pass=sha1($_POST['pass']);// get data and encrypted by SHA1
 
//to include dbconnection
include("../../common/dbconnection.php");

$sql="SELECT * FROM staff s,staff_role r WHERE  r.st_r_id=s.st_r_id AND s.st_email='$email' AND st_password='$pass'";

$results=mysqli_query($con,$sql);//To execute query
$nor=mysqli_num_rows($results);// to count no of records

if($nor==1){
	$row=mysqli_fetch_assoc($results);//To create an array
	$_SESSION['user_info']=$row;//Assign data into a Session
	$_SESSION['st_id']=time()."_".$row['st_id'];//Unique id
	header("Location:dashboard.php");
}else{
	$msg="Invalid Username or Password!!!";
	header("Location:index.php?msg=$msg");//Passing through URL
}


?>