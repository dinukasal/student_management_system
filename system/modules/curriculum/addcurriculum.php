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

$sql="SELECT * FROM curriculum";//using php 

$results=mysqli_query($con,$sql);//To execute query

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Add Curriculum</title>


</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       <div id="newnavi">
       
       <?php include "../../common/navi.php";?>
       
       </div>
       <div id="newcontent">
       <h2 align="center">Add Curriculum</h2>
       <hr />

       <div style="float:left; width:40%; padding-left:30px;">
       <a href="curriculum.php"><button type="button" class="btn btn-warning">Curriculum Management</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
       
       <div style="float:right; padding-right:30px;">
       </div>
       
       <div>&nbsp;</div>
       <div>&nbsp;</div>
       <div>&nbsp;</div>  
      
      <div class="table-area">
      <div id="show" class="alert-danger" style="padding-left:10px" > </div>
      <form method="post" action="addcurriculumprocess.php" enctype="multipart/form-data" onsubmit="return curriculumvalidation()">
      
<table width="95%"  border="0" align="center" class="table table-hover" >

 <tr>
    <td colspan="1" width="25%">Curriculum Name :</td>
    <td width="20%"><input type="text" name="cur_name" id="cur_name"/></td>
    </tr>
   
   <tr>
    <td width="19%" colspan="1">Curriculum Description :</td>
    <td width="20%"><textarea name="cur_description"  id="cur_description" cols="50" rows="8"></textarea></td>
 </tr>
  
   <tr>
    <td>Grade :</td>
    <td>Start :
      <select name="gr_start" id="gr_start" class="input-sm" >
          <option value="">Select no of grades</option>
          
          <?php for($s=1; $s<=13; $s++){ ?>
          <option value="<?php echo $s;?>"><?php echo $s;?></option>
          <?php } ?>
      
        </select>
        </td>
        
    <td>End :
      <select name="gr_end" id="gr_end" class="input-sm" >
          <option value="">Select no of grades</option>
          
          <?php for($e=1; $e<=13; $e++){ ?>
          <option value="<?php echo $e;?>"><?php echo $e;?></option>
          <?php } ?>
      
        </select>
        </td>   
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
    <button type="submit" name="add" class="btn-warning"><i class="glyphicon glyphicon-add"></i>Add</button>
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