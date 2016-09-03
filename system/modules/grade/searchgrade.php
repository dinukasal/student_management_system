<?php
//ERROR REPORTING
error_reporting(E_WARNING | E_PARSE);
$page=$_GET['page'];
$search=$_REQUEST['search'];
if ($page=="" || $page==1){
$page1=0;
}else{
	$page1=($page*5)-5;
	
	
}



if(!isset($_SESSION)){
	session_start();
}
if($_SESSION['st_id']==""){// To resrict if you are not login  as a user
	$msg="Please Logn to the system";
	header("Location:../login/index.php?msg=$msg");
	exit();
}
$user_info=$_SESSION['user_info'];
$fname=$user_info['st_fname'];
$lname=$user_info['st_lname'];
$role_name=$user_info['st_r_name'];
$role_id=$user_info['st_r_id'];//User Role id

include("../../common/dbconnection.php");

//to get a total no of records
$sqlgr="SELECT * FROM grade  WHERE gr_name LIKE '$search%'";

$resultsgr=mysqli_query($con,$sqlgr);//To execute query
$norgr=mysqli_num_rows($resultsgr);// to count no of records

$nopage=ceil($norgr/5);// nearest number

//to display no of records per page
$sqlg="SELECT * FROM grade  WHERE gr_name LIKE '$search%' limit $page1,5";

$resultg=mysqli_query($con,$sqlg);//To execute query
$norg=mysqli_num_rows($resultg);// to count no of records and limit to 5_ define rows


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Search Grade</title>
</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       <div id="newnavi">
       
       <?php include "../../common/navi.php";?>
       
       </div>
       <div id="newcontent">
       <h2 align="center">Grade Search</h2>
       <hr />
       
       <div style="float:left; width:40%; padding-left:30px;">
       <a href='grade.php'><button type="button" class="btn btn-warning">Grade Management</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashbord</button></a>
       </div>
        
       <div style="float:right; padding-right:30px;">
       <form action="searchgrade.php" method="post">Serach :
        <input type="text" name="search" required="required"/>
       <button type="submit" class="btn btn-warning">Search</button>
       </form>
       </div>
       <div>&nbsp;</div>
       <div>&nbsp;</div>
        <div>&nbsp;</div>
      
       <table width="90%" border="1" class="table  table-hover" >
  <tr>
    <td width="11%" >Grade Name</td>
    <td width="58%" >Description</td>
    <td width="31%">&nbsp;</td>
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
<button type="button" class="btn btn-warning">Deactivate</button>    </a>
   <?php } else { ?>
    <a href="deletegrade.php?gr_id=<?php echo $rowg['gr_id'];?>&action=Activate" onclick="return getConfirm('Activate')">
<button type="button" class="btn btn-success">Activate</button>    </a>
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
		<li><a href="searchgrade.php?page=<?php echo $i; ?>&search=<?php echo $search; ?>">
		<?php echo $i; ?></a></li>
		<?php } ?>
	</ul>
 </nav>
 </div>

       
       
       
       
       
     
       
       </div>
       <div id="newfooter"><?php include "../../common/newfooter.php";?></div>
       
    </div>
</body>
</html>