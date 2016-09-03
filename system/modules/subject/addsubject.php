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
<title>Student Management System-Add Subject</title>


</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       <div id="newnavi">
       
       <?php include "../../common/navi.php";?>
       </div>
       
       <div id="newcontent">
       <h2 align="center">Add Subject</h2>
       <hr />
       <div id="row">
       <h4 class="alert_info">Add Subject Details Here!!!</h4></div>
       <div style="float:left; width:40%; padding-left:30px;">
       <a href="subject.php"><button type="button" class="btn btn-warning">Subject Management</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
       
       <div>&nbsp;</div>
       <div>&nbsp;</div>
       <div>&nbsp;</div>  
      
      <div class="table-area">
      <div id="show" class="alert-danger" style="padding-left:10px" > </div>
      <form method="post" action="addsubjectprocess.php" enctype="multipart/form-data" onsubmit="return subjectvalidation()" >
      
<table width="95%"  border="0" align="center" class="table table-hover" cellpadding="2" cellspacing="2" >

    <tr>
   <td width="19%" >Curriculum</td>
   <td width="23%">
    <select name="cur_id" id="cur_id">
          <option value="">Select a Curriculum</option>
          <?php while($rowc=mysqli_fetch_assoc($resultc)){?>
<option value="  <?php echo $rowc['cur_id'];?>">
  <?php echo $rowc['cur_name'];?></option>
    <?php } ?>
    </select>
    </td>  

     <td width="4%">Grade</td><td width="54%">
<select name="gr_id" id="gr_id">
          <option value="">Select a Grade</option>
          <?php while($rowg=mysqli_fetch_assoc($resultg)){?>
<option value="  <?php echo $rowg['gr_id'];?>">
  <?php echo $rowg['gr_name'];?></option>
    <?php } ?>
    </select> </td>   
    </tr>
    
      <tr>
     
    <td>Subject Code : </td>
    <td><input type="text" name="sub_code" id="sub_code"/></td>
    </tr>
    
  
 <tr>
    <td >Subject Title</td>
    <td><input type="text" name="sub_title" id="sub_title"/>    </td>
    </tr>
    
    
    <tr>
    
    <td>Subject Incharge : </td>
    <td><input type="text" name="sub_incharge" id="sub_incharge"/></td>
    </tr>
    
            
    <tr>
   <td align="justify">Subject Description :</td>
    <td><textarea name="sub_description"  id="sub_description" cols="50" rows="8" ></textarea></td>
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