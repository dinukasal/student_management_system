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

$st_id = $_GET['st_id'];
$sql="SELECT * FROM staff s,staff_role r,district d WHERE s.st_r_id=r.st_r_id  AND s.st_id=$st_id AND d.district_id=s.district_id";
$results = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($results);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Staff Full View</title>
</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       <div id="newnavi">
       
       <?php include "../../common/navi.php";?>
       
       </div>
       <div id="newcontent">
       <h2 align="center">Staff Full View</h2>
       <hr />
            
       <div style="float:left; width:40%; padding-left:30px;">
       <a href='staff.php'><button type="button" class="btn btn-warning">Staff Details</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
       
       <div style="float:right; padding-right:30px;">
       <form action="staff.php" method="post">
       <input type="text" name="search" required="required"/>
       <button type="submit" class="btn btn-warning">Search</button>
     
       
       </form>
         </div>
       <div>&nbsp;</div>
       <div>&nbsp;</div>
        <div>&nbsp;</div>
 
<form method="post" action="addstaffprocess.php" enctype="multipart/form-data" onsubmit="return staffvalidation()" style="background-color:#FFC">
      
<table width="90%" border="0" align="center" cellpadding="2" cellspacing="2" class="table table-hover" >
  <tr>
    <td>Photo :</td>
    <td>
     <?php
 $image='images.png'; 
 if($row['photo'] !=""){
	 $image=$row['photo'];
 }
 ?>
 <img src="photo/<?php echo $image; ?>" width="50" height="50" />
    
    </td>
    <td>Role :</td>
    <td>
<?php echo $row['st_r_name'];?>
    </td>
     <td colspan="2">&nbsp;</td>
</tr>

<tr>
    <td >Staff Title :</td>
    <td width="17%" ><?php echo $row['st_title']; ?></td>
    </td>
        <td colspan="4">&nbsp;</td>
        </tr>
 
 <tr>
    <td colspan="1" width="11%">First Name :</td>
    <td width="17%" ><?php echo $row['st_fname']; ?></td>
    <td colspan="1" width="18%">Last Name :</td>
    <td width="20%" ><?php echo $row['st_lname']; ?></td>
    <td colspan="2">&nbsp;</td>
</tr>
 
 <tr>
    <td>Address 1 :</td>
    <td width="17%" ><?php echo $row['st_address1']; ?></td>
    <td>Address 2 :</td>
    <td width="20%" ><?php echo $row['st_address2']; ?></td>
    <td>Address 3 :</td>
    <td width="16%" ><?php echo $row['st_address3']; ?></td>
 </tr>
 
 <tr>
    <td>Contact No1 :</td>
    <td width="17%" ><?php echo $row['st_contact_no1']; ?></td>
    <td>Contact No2 :</td>
    <td width="20%" ><?php echo $row['st_contact_no2']; ?></td>
    <td colspan="2">&nbsp;</td>
 </tr>
 
 <tr>
   <td>Email Address :</td>
    <td width="17%" ><?php echo $row['st_email']; ?></td>
   <td>NIC :</td>
   <td width="20%" ><?php echo $row['st_nic']; ?></td>
    <td colspan="2">&nbsp;</td>
 </tr> 

 <tr>
    <td>City :</td>
    <td width="17%" ><?php echo $row['st_city']; ?></td>
    <td>District :</td>
    <td width="20%" ><?php echo $row['district_name']; ?></td>
    <td colspan="2">&nbsp;</td>
 </tr>
 
 <tr>
    <td>DoB :</td>
    <td width="17%" ><?php echo $row['st_dob']; ?></td>
    <td>Gender :</td>
    <td>
    <td width="18%" ><?php echo $row['st_gender']; ?></td>
    <td colspan="2">&nbsp;</td>
 </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
 
  
</table>
</form>
   </div>
<div id="newfooter"><?php include "../../common/newfooter.php";?></div>
       
    </div>
    
</body>
</html>