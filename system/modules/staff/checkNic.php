<?php
$st_nic=$_GET['q'];
require_once("../../common/dbconnection.php");
$sql="SELECT * FROM staff WHERE st_nic='$st_nic'";
$result=mysqli_query($con,$sql);
$nor=mysqli_num_rows($result);


if(preg_match('/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',$st_nic)){

  if($nor>0){
	$msg="<i class='alert-danger'>Existing NIC</i>"; 
  }else{
	$msg=" <i class='alert-success'>Not Existing NIC</i>";
	  
  }


}else{
	$msg= "<i class='alert-danger'>Invalid NIC</i>";


}
echo $msg;

?>