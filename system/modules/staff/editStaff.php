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

$st_id=$_GET['st_id'];
require_once("../../common/dbconnection.php");
$sql="SELECT * FROM staff s,staff_role r,district d,province p WHERE  r.st_r_id=s.st_r_id AND s.st_id='$st_id' AND d.district_id=s.district_id AND p.province_id=d.province_id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);


$sqld="SELECT * FROM district";
$resultd=mysqli_query($con,$sqld);

$sqlr="SELECT * FROM staff_role";
$resultr=mysqli_query($con,$sqlr);



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Edit Staff</title>

<script>

function showProvince(str)//adjax part
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("show1").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)//4 means ok 200 means sucssess
    {
    document.getElementById("show1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getProvince.php?q="+str,true);// q variable , str -parameter 
xmlhttp.send();
}




</script>

</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       <div id="newnavi">
       
       <?php include "../../common/navi.php";?>
       
       </div>
       <div id="newcontent">
       <h2 align="center">Edit Staff</h2>
       <hr />
       <div style="float:left; width:40%; padding-left:30px;">
    
       <a href='staff.php'><button type="button" class="btn" style="background-color:#FC6">Staff Details</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
      <br/>
      <br/>
      
      
       <div id="table-area" >
<form method="post" action="editstaffprocess.php?st_id=<?php echo $st_id; ?>" enctype="multipart/form-data" onsubmit="return staffvalidation()">
      
<table width="90%" border="0" align="center" class="table table-hover" >
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
    <td><input type="file" name="st_photo" id="st_photo" /></td>
    <td>Role :</td>
    <td>
    <select name="st_r_id" id="st_r_id">
      
    
          <option value="">Select a Role</option>
          <?php while($rowr=mysqli_fetch_assoc($resultr)){?>
<option value="<?php echo $rowr['st_r_id'];?>" 
<?php if($rowr['st_r_id']==$row['st_r_id']) {
	echo "selected";
} ?>

>
  <?php echo $rowr['st_r_name'];?></option>
    <?php } ?>
    </select>
    </td>  
 </tr>
<tr>
    <td >Staff Title :</td>
    <td colspan="5">
    
    <?php 
	//echo strtoupper($row['st_title']);
	if(strtoupper($row['st_title'])=="MR") { ?>
	<input type="radio" name="st_title" id="mr" value="MR" checked="checked" />Mr
    <input type="radio" name="st_title" id="ms" value="MS" />Ms
    <input type="radio" name="st_title" id="mrs" value="MRS" />Mrs
    <?php } 
    
    if(strtoupper($row['st_title'])=="MS") { ?>
	<input type="radio" name="st_title" id="mr" value="MR"  />Mr
    <input type="radio" name="st_title" id="ms" value="MS" checked="checked"/>Ms
    <input type="radio" name="st_title" id="mrs" value="MRS" />Mrs
    <?php } 
    
    if(strtoupper($row['st_title'])=="MRS") { ?>
	<input type="radio" name="st_title" id="mr" value="MR"  />Mr
    <input type="radio" name="st_title" id="ms" value="MS" />Ms
    <input type="radio" name="st_title" id="mrs" value="MRS" checked="checked" />Mrs
    <?php } ?>
    </td>
    </td>
 </tr>
 <tr>
    <td colspan="1" width="11%">First Name :</td>
    <td><label for="st_fname"></label>
    <input type="text" name="st_fname" id="st_fname"
    required 
    value="<?php echo $row['st_fname']; ?>"></td>
    <td colspan="1" width="18%">Last Name :</td>
    <td><label for="st_lname"></label>
    <input type="text" name="st_lname" id="st_lname"
    required 
    value="<?php echo $row['st_lname']; ?>"></td>
 </tr>
 <tr>
    <td>Address 1 :</td>
    <td><label for="st_address1"></label>
    <input type="text" name="st_address1" id="st_address1"
    required 
    value="<?php echo $row['st_address2']; ?>"></td>
    <td>Address 2 :</td>
    <td><label for="st_address2"></label>
    <input type="text" name="st_address2" id="st_address2"
    required 
    value="<?php echo $row['st_address3']; ?>"></td>
    <td>Address 3 :</td>
    <td><label for="st_address3"></label>
    <input type="text" name="st_address3" id="st_address3"
    required 
    value="<?php echo $row['st_address3']; ?>"></td>
 </tr>
 <tr>
    <td>Contact No1 :</td>
    <td><label for="st_contact_no1"></label>
    <input type="text" name="st_contact_no1" id="st_contact_no1"
    required 
    value="<?php echo $row['st_contact_no1']; ?>"></td>
    <td>Contact No2 :</td>
    <td><label for="st_contact_no2"></label>
    <input type="text" name="st_contact_no2" id="st_contact_no2"
    required 
    value="<?php echo $row['st_contact_no2']; ?>"></td>
 </tr>
 <tr>
   <td>Email Address :</td>
    <td><label for="st_email"></label>
    <input type="text" name="st_email" id="st_email"
    required 
    value="<?php echo $row['st_email']; ?>"></td>
   <td>NIC :</td>
    <td><label for="st_nic"></label>
    <input type="text" name="st_nic" id="st_nic"
    required 
    value="<?php echo $row['st_nic']; ?>"></td>
 <tr> 
 <tr>
    <td>City :</td>
    <td><label for="st_city"></label>
    <input type="text" name="st_city" id="st_city"
    required 
    value="<?php echo $row['st_city']; ?>"></td>
    <td>District :</td>
    <td>
    <select name="district_id" id="district_id" required="required" onchange="showProvince(this.value)">
   
      <?php while($rowd=mysqli_fetch_assoc($resultd)){?>
    <option value="<?php echo $rowd['district_id'];?>" 
    <?php if($rowd['district_id']==$row['district_id']) {
	echo "selected";
} ?>
    ><?php echo $rowd['district_name'];?></option>
      <?php } ?>
    </select>
     </td>
     <td> Province :</td>    
     <td ><span id="show1">
     
     <?php echo $row['province_name']; ?>
     </span>&nbsp;</td>

 </tr>
    <td>DoB :</td>
    <td><label for="st_dob"></label>
    <input type="text" name="st_dob" id="st_dob"
    required 
    value="<?php echo $row['st_dob']; ?>"></td>
    <td>Gender :</td>
    <td>
     <?php if($row['st_gender']=="Male"){ ?>
   <input type="radio" name="st_gender" id="m" value="Male" checked="checked" />Male
   <input type="radio" name="st_gender" id="f" value="Female" />Female
   
   
   <?php } else { ?>
   
    
   <input type="radio" name="st_gender" id="m" value="Male"  />Male
   <input type="radio" name="st_gender" id="f" value="Female" checked="checked"/>Female
   
   
   <?php } ?>
   
   </td>
   <td colspan="2">&nbsp;</td>
 
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  

   <tr>
       <td>&nbsp;</td>
    <td>&nbsp;</td>

         <td align="center"><button type="submit" class="btn btn-warning">Save</button></td>
</tr>
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
</table>
</form>
</div></div>
<div id="newfooter"><?php include "../../common/newfooter.php";?></div>
       
    </div>
</body>
</html>




