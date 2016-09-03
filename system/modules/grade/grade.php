<?php
//ERROR REPORTING
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$page=$_GET['page'];
if($page=="" || $page==1){
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
$st_id=$user_info['st_id'];// for currently accessed user


include("../../common/dbconnection.php");


$sqlgr="SELECT * FROM grade ORDER BY gr_id DESC";
//$sqlgr="SELECT * FROM grade g,grade_curriculum gc,curriculum c  WHERE  g.gr_id=gc.gr_id AND c.cur_id=gc.cur_id AND g.gr_id='$gr_id' ORDER BY gr_id DESC";


$resultgr=mysqli_query($con,$sqlgr);//To execute query


$norgr=mysqli_num_rows($resultgr);// to count no of records
$nopage=ceil($norgr/5);

$sqlg="SELECT * FROM grade ORDER BY gr_id DESC limit $page1,5";

//$sqlg="SELECT * FROM grade g,grade_curriculum gc,curriculum c  WHERE  g.gr_id=gc.gr_id AND c.cur_id=gc.cur_id AND gr.gr_id='$gr_id'  DESC limit $page1,5";

$resultg=mysqli_query($con,$sqlg);//To execute query
$norg=mysqli_num_rows($resultg);// to count no of records

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Grade Management</title>

<script type="text/livescript">
function getConfirm(msg) {
var res=confirm("Do You Want to"+msg+" Grade"); // parameter passing dalete, activate,deactivate
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
       <h2 align="center">Grade Management</h2>
       <hr />
       
       <div style="float:left; width:40%; padding-left:30px;">
       <a href='addgrade.php'><button type="button" class="btn btn-warning">Add</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
        
       <div style="float:right; padding-right:30px;">
<form action="searchgrade.php" method="post">
        <input type="text" name="search" required="required"/>
       <button type="submit" class="btn btn-warning">Search</button>
       </form>
       
       </div>
       </br>
       
            <div id="row" align="left">
            
        <span id="row" class="alert_info">
         
           <?php if(isset($_REQUEST['msg'])){
                echo $_REQUEST['msg'];  
           }
           ?>&nbsp;
         </span>
     </div><!----row closed--->
 
       
       
       
       <div>&nbsp;</div>
        <div>&nbsp;</div>
      
       <table width="90%" border="1" class="table  table-hover" >
  <tr>
    <td width="10%">Grade</td>
    <td width="64%">Description</td>
    <td width="20%">&nbsp;</td>
  </tr>
  
  <?php while($rowg=mysqli_fetch_assoc($resultg)){?>
  <tr>
  

    <td><?php echo $rowg['gr_name'];?></td>
    <td style="text-align:justify"><?php echo $rowg['gr_description'];?></td>
    
    <td align="center">



    <a href="editgrade.php?gr_id=<?php echo $rowg['gr_id'];?>">
<img src="../../images/edit.png"  width="30px" height="30px" alt="Edit" /></a>


   
    <a href="deletegrade.php?gr_id=<?php echo $rowg['gr_id'];?>&action=Delete" onclick="return getConfirm('Delete')">
<img src="../../images/delete.png"  width="30px" height="30px" />    </a>

    <?php if($rowg['gr_status'] =="Active"){?>
    <a href="deletegrade.php?gr_id=<?php echo $rowg['gr_id'];?>&action=Deactivate" onclick="return getConfirm('Deactivate')">
<button type="button" class="btn btn-success">Deactivate</button>    </a>
   <?php } else { ?>
    <a href="deletegrade.php?gr_id=<?php echo $rowg['gr_id'];?>&action=Activate" onclick="return getConfirm('Activate')">
<button type="button" class="btn btn-warning">Activate</button>    </a>
  <?php } 
  ?>

    </td>
     
 </tr>
  
  <?php }?>
</table>

<!-- Pagination -->
<div align="left">
<nav>
	<ul class="pagination pagination-sm">
    	<?php for($i=1;$i<=$nopage;$i++){ ?>
		<li><a href="grade.php?page=<?php echo $i; ?>">
		<?php echo $i; ?></a></li>
		<?php } ?>
	</ul>
 </nav>
 </div>







</div>
</div>
     
<div id="newfooter"><?php include "../../common/newfooter.php";?></div>
       
    </div>
</body>
</html>