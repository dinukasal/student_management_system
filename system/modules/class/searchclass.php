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

$sqla="SELECT * FROM class cl, curriculum c, section s WHERE c.cur_id=cl.cur_id AND cl.sec_id=s.sec_id AND (cl.cl_fname LIKE '$search%' or c.cur_name LIKE '$search%' or s.sec_name LIKE '$search%') ";

$resultsa=mysqli_query($con,$sqla);//To execute query
$nora=mysqli_num_rows($resultsa);// to count no of records

$nopage=ceil($nora/5);// nearest number

//to display no of records per page
$sqlcl="SELECT * FROM class cl, curriculum c, section s WHERE c.cur_id=cl.cur_id AND cl.sec_id=s.sec_id AND (cl.cl_fname LIKE '$search%' or c.cur_name LIKE '$search%' or s.sec_name LIKE '$search%') $page1,5";

$resultcl=mysqli_query($con,$sqlcl);//To execute query
$nor=mysqli_num_rows($resultcl);// to count no of records and limit to 5_ define rows


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Class Search</title>
</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       <div id="newnavi">
       
       <?php include "../../common/navi.php";?>
       
       </div>
       <div id="newcontent">
       <h2 align="center">Class Search</h2>
       <hr />
       
       <div style="float:left; width:40%; padding-left:30px;">
       <a href='class.php'><button type="button" class="btn btn-warning">Class Management</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashbord</button></a>
       </div>
        
       <div style="float:right; padding-right:30px;">
       <form action="searchclass.php" method="post">Serach :
        <input type="text" name="search" required="required"/>
       <button type="submit" class="btn btn-warning">Search</button>
       </form>
       </div>
       <div>&nbsp;</div>
       <div>&nbsp;</div>
        <div>&nbsp;</div>
      
       <table width="90%" border="1" class="table  table-hover" >
  <tr>
    <td >Class Name</td>
    <td>Curriculum</td>
    <td>Section</td>
    <td >Descrpion</td>
    <td >&nbsp;</td>
  </tr>
  
  <?php while($rowcl=mysqli_fetch_assoc($resultcl)){?>
  <tr>
  


    <td><?php echo $rowcl['cl_name'];?></td>
    <td><?php echo $rowcl['cur_name'];?></td>
    <td><?php echo $rowcl['sec_name'];?></td>
    <td style="text-align:justify"><?php echo $rowcl['cl_description'];?></td>
    <td align="center">



    <a href="editclass.php?cur_id=<?php echo $rowcl['cur_id'];?>">
<img src="../../images/edit.png"  width="30px" height="30px" alt="Edit" /></a>


   
    <a href="deleteclass.php?cl_id=<?php echo $rowcl['cl_id'];?>&action=Delete" onclick="return getConfirm('Delete')">
<img src="../../images/delete.png"  width="30px" height="30px" />    </a>

    <?php if($rowcl['cl_status'] =="Active"){?>
    <a href="deleteclass.php?cl_id=<?php echo $rowcl['cl_id'];?>&action=Deactivate" onclick="return getConfirm('Deactivate')">
<button type="button" class="btn btn-warning">Deactivate</button>    </a>
   <?php } else { ?>
    <a href="deleteclass.php?cl_id=<?php echo $rowcl['cl_id'];?>&action=Activate" onclick="return getConfirm('Activate')">
<button type="button" class="btn btn-success">Activate</button>    </a>
  <?php } 
  ?>

    </td>
     
 </tr>
  
  <?php }?>
</table>
    

  <!---pagination----->
  <div align="left">
  <nav>
  <ul class="pagination pagination-sm">
  <?php for($i=1;$i<=$nopage;$i++){?>
    <li><a href="searchstaff.php?page=<?php echo $i ?> &search=<?php echo $search; ?>">
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