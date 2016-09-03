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

$cl_id=$_REQUEST['cl_id'];


require_once("../../common/dbconnection.php");

$sqlcl="SELECT * FROM class c WHERE cl_id='$cl_id' ";
$resultcl=mysqli_query($con,$sqlcl);
$rowcl=mysqli_fetch_assoc($resultcl);



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Edit Class</title>

</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       
       <div id="newnavi">
       <?php include "../../common/navi.php";?>
       </div>
       
       <div id="newcontent">
       <h2 align="center">Edit Class Details</h2>
              <hr />

       <div style="float:left; width:40%; padding-left:30px;">
    
       <a href='class.php'><button type="button" class="btn btn-warning">Class Management</button></a>
       &nbsp;&nbsp;
              &nbsp;&nbsp;

       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
      <br/>
      <br/>
      <br/>
       <div id="table-area" >
        
 <form method="post" action="editclassprocess.php?cl_id=<?php echo $cl_id; ?>"onsubmit="return checkForm()">
      
<table width="90%" border="0" align="center" class="table table-hover"  >
  <tr>
     <td >Class Name</td>
    <td><label for="cl_name"></label>
    <input type="text" name="cl_name" id="cl_name"
    required 
    value="<?php echo $rowcl['cl_name']; ?>"></td>
     
        <td>Class Location : </td>
    <td><input type="text" name="cl_location" id="cl_location" required 
    value="<?php echo $rowcl['cl_location']; ?>"/></td>
 
   </tr>
        
<tr>
    <td>Class Teacher : </td>
    <td><input type="text" name="cl_teacher" id="cl_teacher" required 
    value="<?php echo $rowcl['cl_teacher']; ?>"/></td>
    
    <td>No of Students :</td>
    <td><input type="text" name="no_of_students" id="no_of_students" required 
    value="<?php echo $rowcl['no_of_students']; ?>"/></td>
    
    </tr>

    <tr>
    <td>Class Description</td>
    <td><label for="cl_description"></label>
    <input type="text" name="cl_description" id="cl_description"
    required 
    value="<?php echo $rowcl['cl_description']; ?>" ></td>
 </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>
    <button type="submit" name="sub" class="btn-warning"><i class="glyphicon glyphicon-save"></i>Save</button>
    </td>
    <td>
     <button type="RESET" name="RE"><i class="glyphicon glyphicon-refresh"></i>Clear</button>
     </td>
    <td>&nbsp;</td>
  </tr>
  
</table>
</form>
</div>
</div>

<div id="newfooter"><?php include "../../common/newfooter.php";?>
</div>
       
    </div>
</body>
</html>




