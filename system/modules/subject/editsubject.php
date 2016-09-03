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

$sub_id=$_REQUEST['sub_id'];

require_once("../../common/dbconnection.php");

$sqls="SELECT * FROM subject c WHERE sub_id='$sub_id' ";
$results=mysqli_query($con,$sqls);
$rows=mysqli_fetch_assoc($results);



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Edit Subject</title>

</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       
       <div id="newnavi">
       <?php include "../../common/navi.php";?>
       </div>
       
       <div id="newcontent">
       <h2 align="center">Edit Subject Details</h2>
              <hr />

       <div style="float:left; width:40%; padding-left:30px;">
    
       <a href='subject.php'><button type="button" class="btn btn-warning">Subject Management</button></a>
       &nbsp;&nbsp;
              &nbsp;&nbsp;

       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
      <br/>
      <br/>
      <br/>
       <div id="table-area" >
       
        
 <form method="post" action="editsubjectprocess.php?sub_id=<?php echo $sub_id; ?>"onsubmit="return checkForm()">
      
<table width="90%" border="0" align="center" class="table table-hover"  >
  <tr>
     <td >Subject Code</td>
    <td><label for="sub_code"></label>
    <input type="text" name="sub_code" id="sub_code"
    required 
    value="<?php echo $rows['sub_code']; ?>"></td>
     </tr>
     
     <tr>
        <td>Subject Title : </td>
    <td><input type="text" name="sub_title" id="sub_title" required 
    value="<?php echo $rows['sub_title']; ?>"/></td>
 
   </tr>
        
<tr>
    <td>Subject Incharge : </td>
    <td><input type="text" name="sub_incharge" id="sub_incharge" required 
    value="<?php echo $rows['sub_incharge']; ?>"/></td>
       
    </tr>

    <tr>
    <td>Subject Description</td>
    <td><label for="sub_description"></label>
    <input type="text" name="sub_description" id="sub_description"
    required 
    value="<?php echo $rows['sub_description']; ?>" ></td>
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




