<?php
if(!isset($_SESSION)){
	session_start();
}

$s_uname=$_POST['s_uname'];// get data
$s_password=$_POST['s_password'];// get data and encrypted by SHA1
 
//to include dbconnection
include("../../system/common/dbconnection.php");

$sql="SELECT * FROM student s WHERE s.s_uname='$s_uname' AND s_password='$s_password'";

$results=mysqli_query($con,$sql);//To execute query
$nor=mysqli_num_rows($results);// to count no of records

if($nor==1){
	$row=mysqli_fetch_assoc($results);//To create an array
	$_SESSION['user_info']=$row;//Assign data into a Session
	$_SESSION['s_id']=time()."_".$row['s_id'];//Unique id
	header("Location:studentportal.php");
}else{
	$msg="Invalid Username or Password!!!";
	header("Location:index.php?msg=$msg");//Passing through URL
}


?>