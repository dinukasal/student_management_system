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

$gr_id=$_GET['gr_id'];

require_once("../../common/dbconnection.php");
$sqlg="SELECT * FROM grade WHERE gr_id='$gr_id'";

$resultg=mysqli_query($con,$sqlg);
$rowg=mysqli_fetch_assoc($resultg);


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Edit Grade</title>
</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       <div id="newnavi">
       
       <?php include "../../common/navi.php";?>
       
       </div>
       <div id="newcontent">
       <h2 align="center">Edit Grade</h2>
       <hr />
       <div style="float:left; width:40%; padding-left:30px;">
    
       <a href='grade.php'><button type="button" class="btn btn-warning">Grade Management</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
      <br/>
      <br/>
      
      
       <div id="table-area" >
<form method="post" action="editgradeprocess.php?gr_id=<?php echo $gr_id; ?>" enctype="multipart/form-data" onsubmit="return gradevalidation()">
     
 <table width="95%"  border="0" align="center" class="table table-hover" >

 <tr>
    <td width="14%">Grade Name/No :</td>
    <td width="20%"><label for="cur_fname"></label>
    <input type="text" name="gr_name" id="gr_name" required 
    value="<?php echo $rowg['gr_name']; ?>"></td>
    </tr>
    
    <td >Grade Description :</td>
    <td><label for="gr_description"></label>
       <textarea name="gr_description" id="gr_description" rows="10" cols="50"><?php echo $rowg['gr_description']; ?></textarea></td>
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
</div></div>
<div id="newfooter"><?php include "../../common/newfooter.php";?></div>
       
    </div>
</body>
</html>




