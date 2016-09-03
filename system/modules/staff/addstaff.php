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
$st_r_name=$user_info['st_r_name'];
$st_r_id=$user_info['st_r_id'];

include("../../common/dbconnection.php");

$sql="SELECT * FROM staff_role WHERE st_r_id NOT IN (SELECT st_r_id FROM  staff WHERE st_r_id=1 AND st_status='Active' GROUP BY st_r_id HAVING COUNT(*)>=2)";//using php 

$result=mysqli_query($con,$sql);//To execute query

$sqld="SELECT * FROM district";
$resultd=mysqli_query($con,$sqld);

$sqlr="SELECT * FROM staff_role";
$resultr=mysqli_query($con,$sqlr);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Student Management System-Add Staff</title>

<script type="text/javascript" src="../../js/staffvalidation.js"></script>

<script type="text/javascript">

function checkEmail(str)
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
xmlhttp.open("GET","checkEmail.php?q="+str,true);// q variable , str -parameter 
xmlhttp.send();
}



function checkNic(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("show2").innerHTML="";
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
  if (xmlhttp.readyState==4 && xmlhttp.status==200)//4 means ok and 200 means sucssess
    {
    document.getElementById("show2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","checkNic.php?q="+str,true);// q variable , str -parameter 
//get is a backend,simple
//asyncronous-->true:ajax
xmlhttp.send();
}


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
       <h2 align="center">Add Staff</h2>
       <hr />
       <div id="row">
       <h4 class="alert_info">Add your personal details here!!!</h4></div>
       <div style="float:left; width:40%; padding-left:30px;">
       <a href="staff.php"><button type="button" class="btn btn-warning">Staff Management</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashbord</button></a>
       </div>
       
       <div style="float:right; padding-right:30px;">
       </div>
       
       <div>&nbsp;</div>
       <div>&nbsp;</div>
       <div>&nbsp;</div>  
      
      <div class="table-area">
      <div id="show" class="alert-danger" style="padding-left:10px" > </div>
      <form method="post" action="addstaffprocess.php" enctype="multipart/form-data" onsubmit="return staffvalidation()">
      
<table width="95%"  border="0" align="center" class="table table-hover" >
 <tr>
    <td width="25%" >Staff Title</td>
    <td colspan="5"><input type="radio" name="st_title" id="mr" value="MR" />Mr
    <input type="radio" name="st_title" id="ms" value="MS" />Ms
    <input type="radio" name="st_title" id="mrs" value="MRS" />Mrs
    </td>
   
 </tr>
 <tr>
    <td colspan="1" width="25%">First Name</td>
    <td width="20%"><input type="text" name="st_fname" id="st_fname"/></td>
    <td width="19%" colspan="1">Last Name</td>
    <td width="20%"><input type="text" name="st_lname"  id="st_lname"/></td>
    <td colspan="2">&nbsp;</td>
 </tr>
 <tr>
    <td>Address 1</td>
    <td><input type="text" name="st_address1" id="st_address1" /></td>
    <td>Address 2</td>
    <td><input type="text" name="st_address2" id="st_address2" /></td>
    <td width="8%">Address 3</td>
    <td width="17%"><input type="text" name="st_address3" id="st_address3" /></td>
 </tr>
 <tr>
    <td>Contact No1</td>
    <td><input type="text" name="st_contact_no1" id="st_contact_no1" /></td>
    <td>Contact No2</td>
    <td><input type="text" name="st_contact_no2" id="st_contact_no2" /></td>
    <td colspan="2">&nbsp;</td>
 </tr>
 <tr>
    <td>Email Address</td>
    <td><input type="text" name="st_email" id="st_email" /></td>
    <td>DoB</td>
    <td><input type="date" name="st_dob" id="st_dob"/></td>
    <td colspan="2">&nbsp;</td>
 <tr> 
 <tr>
    <td>City</td>
    <td><input type="text" name="st_city" id="st_city" /></td>
   <td>District</td>
   <td><select name="district_id" id="district_id" required="required" onchange="showProvince(this.value)">
      <option value="">Select a District</option>
      <?php while($rowd=mysqli_fetch_assoc($resultd)){?>
    <option value="<?php echo $rowd['district_id'];?>"><?php echo $rowd['district_name'];?></option>
      <?php } ?>
    </select></td>
    
     <td> Province</td>    
     <td ><span id="show1"></span>&nbsp;</td>

 </tr>
   <td>NIC</td>
   <td><input type="text" name="st_nic" id="st_nic" /></td>
   <td>Gender</td>
    <td>
   <input type="radio" name="st_gender" id="m" value="Male" />Male
   <input type="radio" name="st_gender" id="f" value="Female" />Female</td>
   <td colspan="2">&nbsp;</td>
 </tr>
 <tr>
    <td>Photo</td>
    <td><input type="file" name="st_photo" id="st_photo" /></td>
    <td>Role</td>
    <td>
    <select name="st_r_id" id="st_r_id">
      
    
          <option value="">Select a Role</option>
          <?php while($rowr=mysqli_fetch_assoc($resultr)){?>
<option value="  <?php echo $rowr['st_r_id'];?>">
  <?php echo $rowr['st_r_name'];?></option>
    <?php } ?>
    </select>
    </td>  
    <td colspan="2">&nbsp;</td>  
 </tr>
 <tr>
    <td>Password</td>
    <td><input type="st_password" name="st_password" id="st_password" /></td>
    <td>Confirm Password</td>
    <td><input type="st_cpassword" name="st_cpassword" id="st_cpassword" /></td>
    <td colspan="2">&nbsp;</td>
 </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>
    <button type="submit" name="sub" class="btn-warning"><i class="glyphicon glyphicon-save"></i>Save</button>
    </td>
    <td>
     <button type="submit" name="sub"><i class="glyphicon glyphicon-refresh"></i>Clear</button>
     </td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
</table>
</form>
 </div>     
    
  
  </div>
       
       
       
 <div id="newfooter"><?php include "../../common/newfooter.php";?></div>
 </div>


</body>
</html>