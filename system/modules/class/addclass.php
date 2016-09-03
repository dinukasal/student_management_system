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



$sqlc="SELECT * FROM curriculum";
$resultc=mysqli_query($con,$sqlc);

$sqlg="SELECT * FROM grade";
$resultg=mysqli_query($con,$sqlg);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Student Management System-Add Class</title>


</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       <div id="newnavi">
       
       <?php include "../../common/navi.php";?>
       </div>
       
       <div id="newcontent">
       <h2 align="center">Add Class</h2>
       <hr />
       <div id="row">
       <h4 class="alert_info">Add Class Details Here!!!</h4></div>
       <div style="float:left; width:40%; padding-left:30px;">
       <a href="class.php"><button type="button" class="btn btn-warning">Class Management</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
       
       <div>&nbsp;</div>
       <div>&nbsp;</div>
       <div>&nbsp;</div>  
      
      <div class="table-area">
      <div id="show" class="alert-danger" style="padding-left:10px" > </div>
      <form method="post" action="addclassprocess.php" enctype="multipart/form-data" onsubmit="return classvalidation()" >
      
<table width="95%"  border="0" align="center" class="table table-hover" cellpadding="2" cellspacing="2" >

    <tr>
   <td width="19%" >Curriculum</td>
   <td width="27%">
    <select name="cur_id" id="cur_id">
          <option value="">Select a Curriculum</option>
          <?php while($rowc=mysqli_fetch_assoc($resultc)){?>
<option value="  <?php echo $rowc['cur_id'];?>">
  <?php echo $rowc['cur_name'];?></option>
    <?php } ?>
    </select>
    </td>  

     <td width="34%">Grade</td><td width="20%">
<select name="gr_id" id="gr_id">
          <option value="">Select a Grade</option>
          <?php while($rowg=mysqli_fetch_assoc($resultg)){?>
<option value="  <?php echo $rowg['gr_id'];?>">
  <?php echo $rowg['gr_name'];?></option>
    <?php } ?>
    </select> </td>   
    </tr>
    
    
 <tr>
    <td >Class Name</td>
    <td><input type="text" name="cl_name" id="cl_name"/>    
</td>
     
    <td>Class Location : </td>
    <td><input type="text" name="cl_location" id="cl_location"/></td>
    
    <tr>
    
    <td>Class Teacher : </td>
    <td><input type="text" name="cl_teacher" id="cl_teacher"/></td>
    
    <td>No of Students :</td>
    <td><input type="text" name="no_of_students" id="no_of_students"/></td>
    
    </tr>
    
    <tr>
    
   <td colspan="1">Class Description :</td>
    <td><textarea name="cl_description"  id="cl_description" cols="50" rows="8" ></textarea></td>
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
       
       
       
 <div id="newfooter"><?php include "../../common/newfooter.php";?></div>
 </div>


</body>
</html>