<?php
if(!isset($_SESSION)){
	session_start();
}

$_SESSION['files_p']=$_FILES;

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

$sqlcl="SELECT * FROM class cl, curriculum c, section s WHERE c.cur_id=cl.cur_id AND cl.sec_id=s.sec_id" ;

$resultcl=mysqli_query($con,$sqlcl);//To execute query

$sqls="SELECT * FROM section";
$results=mysqli_query($con,$sqls);

$sqlc="SELECT * FROM curriculum";
$resultc=mysqli_query($con,$sqlc);

$sqlg="SELECT * FROM grade";
$resultg=mysqli_query($con,$sqlg);

//var_dump($_POST);

$_SESSION['p_fname']=$_POST['p_fname'];
$_SESSION['p_lname']=$_POST['p_lname'];
$_SESSION['p_relationship']=$_POST['p_relationship'];
$_SESSION['s_address1']=$_POST['s_address1'];
$_SESSION['s_address2']=$_POST['s_address2'];
$_SESSION['s_address3']=$_POST['s_address3'];
$_SESSION['p_contact_no1']=$_POST['p_contact_no1'];
$_SESSION['p_contact_no2']=$_POST['p_contact_no2'];
$_SESSION['st_nic']=$_POST['st_nic'];
$_SESSION['p_email']=$_POST['p_email'];
$_SESSION['st_gender']=$_POST['st_gender'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Student Registration-Enrollement</title>


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
       <a href="student.php"><button type="button" class="btn btn-warning">Student Management</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
       
       <div>&nbsp;</div>
       <div>&nbsp;</div>
       <div>&nbsp;</div>  
      
      <div class="table-area">
      <div id="show" class="alert-danger" style="padding-left:10px" > </div>
      <form method="post" action="addstudentprocess.php" enctype="multipart/form-data" onsubmit="return studentvalidation()"  >
      
<table width="95%"  border="0" align="center" class="table table-hover" cellpadding="2" cellspacing="2" >

    <tr>
   <td width="12%" >Acedemic Year : </td>
   <td width="69%"><select name="year" id="year" class="input-sm" >
          <option value="">Select an Academic Year</option>
          
          <?php for($i=2016; $i<=2020; $i++){ ?>
          <option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php } ?>
      
        </select>

    </td>  
    </tr>

    <tr>
   <td >Curriculum</td>
   <td>
    <select name="cur_id" id="cur_id">
          <option value="">Select a Curriculum</option>
          <?php while($rowc=mysqli_fetch_assoc($resultc)){?>
<option value="  <?php echo $rowc['cur_id'];?>">
  <?php echo $rowc['cur_name'];?></option>
    <?php } ?>
    </select>
    </td>  
    </tr>
    
     <tr>
     <td>Grade</td><td>
<select name="gr_id" id="gr_id" onclick="showclasses()">
          <option value="">Select a Grade</option>
          <?php while($rowg=mysqli_fetch_assoc($resultg)){?>
<option value="  <?php echo $rowg['gr_id'];?>">
  <?php echo $rowg['gr_name'];?></option>
    <?php } ?>
    </select> </td>   
    </tr>
    
    
 <tr>
    <td >Class Name</td>
    <td><select name="cl_id" id="cl_id">
    <option value="">Select a class</option>
    </select>    
</td>
     </tr>
     
    
  <tr>
  <td> Registration Date</td>
  <td><input type="date" name="date" id="date" /></td>
  </tr>
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

    <td width="16%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
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
<script src="../../js/jquery-1.12.2.min.js"></script>

<script type="text/javascript">
  function showclasses() {
		$("#gr_id").click(
			function(){
				$.ajax({
				  url: "getclasses.php",
				  type: "post",
				  data: {
					  curriculum: $("#cur_id").val(),
					  grade: $("#gr_id").val()
					  },
				  success: function(data){
					$("#cl_id").html(data);
				  },
				  error:function(){
					 alert("Error!");
				  }   
				}); 
			}
		);
  }
  </script>
</html>