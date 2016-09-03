<?php
if(!isset($_SESSION)){
	session_start();
}
if($_SESSION['st_id']==""){// To resrict if you are not login  as a user
	$msg="Please Logn to the system";
	header("Location:../login/index.php?msg=$msg");
	exit();
}
$user_info=$_SESSION['user_info'];
$st_fname=$user_info['st_fname'];
$st_lname=$user_info['st_lname'];
$st_r_name=$user_info['st_r_name'];//staff role name
$st_r_id=$user_info['st_r_id'];//staff Role id

include("../../common/dbconnection.php");

$s_id = $_GET['s_id'];
$sql="SELECT * FROM student where s_id='$s_id'";
$results = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($results);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Student Full View</title>
</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       <div id="newnavi">
       
       <?php include "../../common/navi.php";?>
       
       </div>
       <div id="newcontent">
       <h2 align="center">Student Full View</h2>
       <hr />
            
       <div style="float:left; width:40%; padding-left:30px;">
       <a href='student.php'><button type="button" class="btn btn-warning">Student Details</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
       
       <div style="float:right; padding-right:30px;">
       <form action="student.php" method="post">
       <input type="text" name="search" required="required"/>
       <button type="submit" class="btn btn-warning">Search</button>
     
       
       </form>
         </div>
       <div>&nbsp;</div>
       <div>&nbsp;</div>
        <div>&nbsp;</div>
 
<form method="post" action="addstudentprocess.php" enctype="multipart/form-data" onsubmit="return studentvalidation()" style="background-color:#FFC">
      
<table width="95%"  border="0" align="center" class="table-condensed"  >

 <tr>
    <td width="15%">Photo :</td>
    <td width="29%">
     <?php
 $image='images.png'; 
 if($row['photo'] !=""){
	 $image=$row['photo'];
 }
 ?>
 <img src="photo/<?php echo $image; ?>" width="50" height="50" /></td>
 </tr>
 
 
 <tr>
    <td>Full Name :</td>
    <td><?php echo $row['s_fname']." ".$row['s_lname'];?> </td>
 </tr>
 
     <tr>
    <td>Gender :</td>
    <td><?php echo $row['s_gender']; ?></td>
    </tr>
    

 <tr>
     <td>Address :</td>
    <td><?php echo $row['s_address1'].", ".$row['s_address2'].", ".$row['s_address3'];?> </td>
 </tr>
 
 <tr>
    <td>Contact Numbers:</td>
    <td><?php echo $row['s_contact_no1'].",".$row['s_contact_no2'];?> </td>
 </tr>
 
 <tr>
    <td>Email Address:</td>
    <td><?php echo $row['s_email']; ?></td>
    </tr>
    
    <tr>
    <td>DoB :</td>
    <td><?php echo $row['s_DoB']; ?></td>
    </tr>
    
    <tr>
    <td>NIC :</td>
    <td><?php echo $row['s_NIC']; ?></td>
 </tr>
  
      <tr>
    <td>User Name :</td>
    <td><?php echo $row['s_uname']; ?></td>
 </tr>
 
     <tr>
    <td>Password :</td>
    <td><?php echo $row['s_password']; ?></td>
 </tr>
 
      <tr>
    <td>Batch id :</td>
    <td><?php echo $row['batch_id']; ?></td>
 </tr>

 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
        <td>&nbsp;</td>

    <td>
    <button type="submit" name="sub" class="btn-warning"><i class="glyphicon glyphicon-save"></i>Save</button>
    </td>
        <td>&nbsp;</td>

    <td width="32%">
     <button type="submit" name="sub"><i class="glyphicon glyphicon-refresh"></i>Clear</button>
     </td>
    <td width="3%">&nbsp;</td>
    <td width="3%" colspan="2">&nbsp;</td>
  </tr>
  
</table>





</form>

<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

   </div>
<div id="newfooter"><?php include "../../common/newfooter.php";?></div>
       
    </div>
    
</body>
</html>