<?php
if(!isset($_SESSION)){
	session_start();
}

      if($_FILES['s_photo'] ['name'] !=""){//if image is there

        $tmp=$_FILES['s_photo'] ['tmp_name'] ;
        //$newimage=$s_id."_".$_FILES['s_photo'] ['name'] ;//uniquly store data
        $newimage=$_FILES['s_photo'] ['name'] ;//
        $path="photo/".$newimage;//path
        copy($tmp,$path);//copy into new path from temp
        $_SESSION['s_photo']=$newimage;
      }

$_SESSION['files_st']=$_FILES;

$_SESSION['s_fname']=$_POST['s_fname']; 
$_SESSION['s_lname']=$_POST['s_lname']; 
$_SESSION['s_address1']=$_POST['s_address1'];
$_SESSION['s_address2']=$_POST['s_address2'];
$_SESSION['s_address3']=$_POST['s_address3'];
$_SESSION['s_contact_no1']=$_POST['s_contact_no1'];
$_SESSION['s_contact_no2']=$_POST['s_contact_no2'];
$_SESSION['s_email']=$_POST['s_email'];
$_SESSION['s_NIC']=$_POST['s_NIC'];
$_SESSION['s_DoB']=$_POST['s_DoB'];
$_SESSION['s_gender']=$_POST['s_gender'];
$_SESSION['s_status']="Active";
//$_SESSION['s_password']=$_POST['s_password'];
$_SESSION['s_uname']=$_POST['s_uname'];
$_SESSION['password']=sha1($_POST['s_password']);

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

$sql="SELECT * FROM parent";
$result=mysqli_query($con,$sql);//To execute query

//var_dump($_POST);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Add Student-Parent info</title>

<script type="text/javascript" src="../../js/parentvalidation.js"></script>

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
       
              <a href="addstudent.php"><img src="../../images/back.jpg" height="50" width="50"/></a>
       &nbsp;&nbsp;
       <a href="student.php"><button type="button" class="btn btn-warning">Student Management</button></a>
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
      <form method="post" action="enrollement.php" enctype="multipart/form-data" onsubmit="return parentvalidation()">
      
      <p><h4 style="color:#F00">Add parents details!</h4></p>
      <hr />
<table width="95%"  border="0" align="center" class="table table-hover" >
 
  <tr>
    <td>Photo</td>
    <td><input type="file" name="st_photo" id="st_photo" /></td>
    <td colspan="4">&nbsp;</td>  
 </tr>
 
 <tr>
    <td colspan="1" >First Name</td>
    <td><input type="text" name="p_fname" id="p_fname"/></td>
    <td colspan="1">Last Name</td>
    <td><input type="text" name="p_lname"  id="p_lname"/></td>
    <td colspan="1">Relationship</td>
    <td><input type="text" name="p_relationship"  id="p_relationship"/></td>
 </tr>
 
 <tr>
    <td>Address 1</td>
    <td><input type="text" name="s_address1" id="s_address1"
    required value="<?php echo $_POST['s_address1']; ?>"></td>
</td>
    <td>Address 2</td>
    <td><input type="text" name="s_address2" id="s_address2"
    required value="<?php echo $_POST['s_address2']; ?>"></td>
    <td>Address 3</td>
    <td><input type="text" name="s_address3" id="s_address3"
    required value="<?php echo $_POST['s_address3']; ?>"></td>
 </tr>
 
 <tr>
    <td>Contact No1</td>
    <td><input type="text" name="p_contact_no1" id="p_contact_no1" /></td>
    <td>Contact No2</td>
    <td><input type="text" name="p_contact_no2" id="p_contact_no2" /></td>
        <td colspan="2">&nbsp;</td>  
</tr>

<tr>
   <td>NIC</td>
   <td><input type="text" name="st_nic" id="st_nic" /></td>
    <td>Email Address</td>
    <td><input type="text" name="p_email" id="p_email" /></td>
   <td>Gender</td>
    <td>
   <input type="radio" name="st_gender" id="m" value="Male" checked/>Male
   <input type="radio" name="st_gender" id="f" value="Female" />Female</td>

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
    <button type="submit" name="next" class="btn-warning"><i class="glyphicon glyphicon-next"></i>Next</button>
    </td>
        <td>&nbsp;</td>
    <td>
    <button type="submit" name="skip" class="btn-warning"><i class="glyphicon glyphicon-skip"></i>Skip</button>
    </td>
        <td>&nbsp;</td>

    <td>
     <button type="submit" name="submit"><i class="glyphicon glyphicon-refresh"></i>Clear</button>
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