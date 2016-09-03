<?php

//ERROR REPORTING
error_reporting(E_WARNING | E_PARSE);
$page=$_GET['page'];
if ($page=="" || $page==1){
$page1=0;
}else{
	$page1=($page*5)-5;
	
	
}

if(!isset($_SESSION)){
	session_start();
}
if($_SESSION['st_id']==""){// To resrict if you are not login  as a user
	$msg="Please Login to the system";
	header("Location:../login/index.php?msg=$msg");
	exit();
}

$user_info=$_SESSION['user_info'];
$st_fname=$user_info['st_fname'];
$st_lname=$user_info['st_lname'];
$st_r_name=$user_info['st_r_name'];//staff role name
$st_r_id=$user_info['st_r_id'];//staff Role id

$st_id=$user_info['st_id'];//get Staff_id for currently accessed user
//$cl_id=$user_info['cl_id'];//get Staff_id for currently accessed user

include("../../common/dbconnection.php");


$sqlt="SELECT * FROM time_table t, class c, subject s WHERE t.cl_id=c.cl_id AND t.sub_id=s.sub_id " ;

$resultt=mysqli_query($con,$sqlt);//To execute query
$nort=mysqli_num_rows($resultt);// to count no of records


$nopage=ceil($nort/5);// nearest number

$sql="SELECT * FROM time_table t, class c, subject s WHERE t.cl_id=c.cl_id AND t.sub_id=s.sub_id limit $page1,5" ;

$result=mysqli_query($con,$sql);//To execute query
$nor=mysqli_num_rows($result);// to count no of records and limit to 3

$sqlc="SELECT *FROM class";
$resultc=mysqli_query($con,$sqlc);

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Time_Table Management</title>

<script type="text/livescript">
function getConfirm(msg) {
var res=confirm("Do You Want to"+msg+" Time Table"); // parameter passing dalete, activate,deactivate
if(res){
  return true;
}else{
	return false;
}
	
	
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
       <h2 align="center">Time Table Management</h2>
       <hr />
       
       <div style="float:left; width:40%; padding-left:30px;">
       <a href='addtime_table.php'>
       <button type="button" class="btn btn-warning">Add</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
        
       <div style="float:right; padding-right:30px;">
<form action="searchtime_table.php" method="post">
        <input type="text" name="search" required="required"/>
       <button type="submit" class="btn btn-warning">Search</button>
       </form>
       
       </div>
       
       <div>&nbsp;</div>
       <div>&nbsp;</div>
        <div>&nbsp;</div>
        
        
  <!---selection of curriculum----->

  <form method="post" action="time_table.php?tt_id=tt_id" enctype="multipart/form-data" onSubmit="return time_tablevalidation()">

 <table width="87%" height="38" border="0" align="center" class="table table-responsive" style="margin-left:20px">
 <tr>
 <h4>Please Select a Class to view time table!!!</h4>
 <td width="12%">Class :</td>
<td width="88%">
<select name"cl_id" id="cl_id" class="form-control" required>
          <option value="">Select a Class</option>
          <?php while($rowc=mysqli_fetch_assoc($resultc)){?>
<option value="  <?php echo $rowc['cl_id'];?>">
  <?php echo $rowc['cl_name'];?></option>
    <?php } ?>
    </select> </td>
       </tr>

  </table>
  </form>

<hr/>
  <!---class 1L----->

<div class="c1L_frm">
  <table width="90%" border="1" class="table  table-hover" >
  <tr>
    <td >Date</td>
    <td>Time</td>
    <td >Term</td>
    <td >Acedemic year</td>
    <td >&nbsp;</td>
  </tr>
  
  <?php while($rowt=mysqli_fetch_assoc($resultt)){?>
  <tr>
  


    <td><?php echo $rowt['date'];?></td>
    <td><?php echo $rowcl['time'];?></td>
    <td><?php echo $rowcl['term'];?></td>
    <td><?php echo $rowcl['acedemic_year'];?></td>
    
    <td align="center">



    <a href="edittime_table.php?cur_id=<?php echo $rowt['tt_id'];?>">
<img src="../../images/edit.png"  width="30px" height="30px" alt="Edit" /></a>


   
    <a href="deletetime_table.php?tt_id=<?php echo $rowt['tt_id'];?>&action=Delete" onclick="return getConfirm('Delete')">
<img src="../../images/delete.png"  width="30px" height="30px" />    </a>

    <?php if($rowt['tt_status'] =="Active"){?>
    <a href="deletetime_table.php?tt_id=<?php echo $rowt['tt_id'];?>&action=Deactivate" onclick="return getConfirm('Deactivate')">
<button type="button" class="btn btn-warning">Deactivate</button>    </a>
   <?php } else { ?>
    <a href="deletetime_table.php?tt_id=<?php echo $rowt['tt_id'];?>&action=Activate" onclick="return getConfirm('Activate')">
<button type="button" class="btn btn-success">Activate</button>    </a>
  <?php } 
  ?>

    </td>
     
 </tr>
  
  <?php }?>
</table>
</div>

</hr>









</div>




  <!---pagination----->
  <div align="left">
  <nav>
  <ul class="pagination pagination-sm">
  <?php for($i=1;$i<=$nopage;$i++){?>
    <li><a href="class.php?page=<?php echo $i ?>">
	<?php echo $i; ?></a></li>
    <?php } ?>
  </ul>
  </nav>
  </div>     
  
       </div>
     
<div id="newfooter"><?php include "../../common/newfooter.php";?></div>
       
    </div>
    
    
    
 <script type="text/javascript">

$( "#cur_id" ).change(function() {
	var typeid=$(this).val();
	if(typeid==1){
		$(".c_frm").fadeOut('slow');
		$(".n_frm").fadeIn('slow');
	}else{
		$(".n_frm").fadeOut('slow');
	$(".c_frm").fadeIn('slow');
	}
});

</script>   
</body>
</html>