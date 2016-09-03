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

$sql="SELECT * FROM student";

$result=mysqli_query($con,$sql);//To execute query

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Add Student</title>

<script type="text/javascript" src="../../js/studentvalidation.js"></script>

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






</script>

</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       <div id="newnavi">
       
       <?php include "../../common/navi.php";?>
       
       </div>
       <div id="newcontent">
       <h2 align="center">Add Student</h2>
       <hr />

       <div style="float:left; width:40%; padding-left:30px;">
       <a href="student.php"><button type="button" class="btn btn-warning">Student Registration Management</button></a>
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
      
      <form method="post" action="addstudent_parentinfo.php" enctype="multipart/form-data" onsubmit="return studentvalidation()">
      
<table width="95%"  border="0" align="center" class="table table-hover" >

 <tr>
    <td>First Name</td>
    <td><input type="text" name="s_fname" id="s_fname"/></td>
    <td >Last Name</td>
    <td><input type="text" name="s_lname"  id="s_lname"/></td>
    <td>Photo</td>
    <td><input type="file" name="s_photo" id="s_photo" /></td>

 </tr>
 
 <tr>
    <td>Address 1</td>
    <td><input type="text" name="s_address1" id="s_address1" /></td>
    <td>Address 2</td>
    <td><input type="text" name="s_address2" id="s_address2" /></td>
    <td>Address 3</td>
    <td><input type="text" name="s_address3" id="s_address3" /></td>
 </tr>
 
 <tr>
    <td>Contact No1</td>
    <td><input type="text" name="s_contact_no1" id="s_contact_no1" /></td>
    <td>Contact No2</td>
    <td><input type="text" name="s_contact_no2" id="s_contact_no2" /></td>
   <td>Gender</td>
    <td>
   <input type="radio" name="s_gender" id="m" value="Male" />Male
   <input type="radio" name="s_gender" id="f" value="Female" />Female</td>
 </tr>
 
 <tr>
    <td>Email Address</td>
    <td><input type="text" name="s_email" id="s_email" /></td>
    <td>DoB</td>
    <td><input type="date" name="s_DoB" id="st_DoB"/></td>
    <td>NIC</td>
    <td><input type="text" name="s_NIC" id="st_NIC"/></td>
 </tr>
  
 <tr>
    <td>Username</td>
    <td><input type="s_uname" name="s_uname" id="s_uname" /></td>
    <td>Password</td>
    <td><input type="s_password" name="s_password" id="st_password" /></td>
    <td>Confirm Password</td>
    <td><input type="s_cpassword" name="s_cpassword" id="st_cpassword" /></td>
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
        <td>&nbsp;</td>

    <td>
    <button type="submit" name="next" class="btn-warning"><i class="glyphicon glyphicon-next"></i>Next</button>
    </td>
        <td>&nbsp;</td>

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