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
$sqla="SELECT * FROM subject s,class c,curriculum cr WHERE c.cl_id=s.cl_id AND cr.cur_id=c.cur_id ORDER BY s.sub_id";

$resultsa=mysqli_query($con,$sqla);//To execute query
$nora=mysqli_num_rows($resultsa);// to count no of records

$nopage=ceil($nora/5);// nearest number

//to display no of records per page
$sql="SELECT * FROM subject s,class c,curriculum cr WHERE c.cl_id=s.cl_id AND cr.cur_id=c.cur_id ORDER BY s.sub_id limit $page1,5";

$results=mysqli_query($con,$sql);//To execute query
$nor=mysqli_num_rows($results);// to count no of records and limit to 5_ define rows


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Search Subject</title>
</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       <div id="newnavi">
       
       <?php include "../../common/navi.php";?>
       
       </div>
       <div id="newcontent">
       <h2 align="center">Subject Search</h2>
       <hr />
       
       <div style="float:left; width:40%; padding-left:30px;">
       <a href='subject.php'><button type="button" class="btn btn-warning">Subject Management</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
        
       <div style="float:right; padding-right:30px;">
       <form action="searchsubject.php" method="post">Serach :
        <input type="text" name="search" required="required"/>
       <button type="submit" class="btn btn-warning">Search</button>
       </form>
       </div>
       <div>&nbsp;</div>
       <div>&nbsp;</div>
        <div>&nbsp;</div>
      
  <table width="90%" border="1" class="table  table-hover" >
  <tr>
    <td>&nbsp;</td>
    <td>Subject Title</td>
    <td>Currriculum</td>
    <td>Class</td>
    <td>Description</td>
    <td>Status</td>
    <td>&nbsp;</td>
  </tr>
  
  <?php while($row=mysqli_fetch_assoc($results)){?>
  <tr>
  <td>&nbsp;</td>
    <td><?php echo $row['sub_title'];?></td>
    <td><?php echo $row['cur_name'];?></td>
    <td><?php echo $row['cl_name'];?></td>
    <td><?php echo $row['sub_description'];?></td>
    <td><?php echo $row['sub_status'];?> </td>
    
    <td align="center">


    <a href="editsubject.php?sub_id=<?php echo $row['sub_id'];?>">
<img src="../../images/edit.png"  width="30px" height="30px" alt="Edit" /></a>

<?php if ($row['sub_id']!=$sub_id) {?>
   
    <a href="deletesubject.php?sub_id=<?php echo $row['sub_id'];?>&action=Delete" onclick="return getConfirm('Delete')">
<img src="../../images/delete.png"  width="30px" height="30px" />    </a>

    <?php if($row['sub_status'] =="Active"){?>
    <a href="deletesubject.php?sub_id=<?php echo $row['sub_id'];?>&action=Deactivate" onclick="return getConfirm('Deactivate')">
<button type="button" class="btn btn-warning">Deactivate</button>    </a>
   <?php } else { ?>
    <a href="deletesubject.php?sub_id=<?php echo $row['sub_id'];?>&action=Activate" onclick="return getConfirm('Activate')">
<button type="button" class="btn btn-success">Activate</button>    </a>
  <?php } 
  }?>

    </td>
     
 </tr>
  
  <?php }?>
</table>


  <!---pagination----->
  <div align="left">
  <nav>
  <ul class="pagination pagination-sm">
  <?php for($i=1;$i<=$nopage;$i++){?>
    <li><a href="searchsubject.php?page=<?php echo $i ?> &search=<?php echo $search; ?>">
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