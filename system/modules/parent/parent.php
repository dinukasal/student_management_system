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

include("../../common/dbconnection.php");

$sqla="SELECT * FROM parent p ORDER BY p.p_id DESC";
$resultsa=mysqli_query($con,$sqla);//To execute query
$nora=mysqli_num_rows($resultsa);// to count no of records

$nopage=ceil($nora/5);// nearest number

$sql="SELECT * FROM parent p ORDER BY p.p_id DESC limit $page1,5";
$results=mysqli_query($con,$sql);//To execute query
$nor=mysqli_num_rows($results);// to count no of records and limit to 5
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Parent Management</title>

<script type="text/livescript">
function getConfirm(msg) {
var res=confirm("Do You Want to "+msg+" parent Account"); // parameter passing dalete, activate,deactivate
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
       <h2 align="center">Parent Management</h2>
       <hr />
       
       <div style="float:left; width:40%; padding-left:30px;">
       <a href='addparent.php'><button type="button" class="btn btn-warning">Add</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
        
       <div style="float:right; padding-right:30px;">
<form action="searchparent.php" method="post">
        <input type="text" name="search" required="required"/>
       <button type="submit" class="btn btn-warning">Search</button>
       </form>
       </div>
       
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
        <div>&nbsp;</div>
      
       <table width="90%" border="1" class="table  table-hover" >
  <tr>
    <td>&nbsp;</td>
    <td>Title</td>
    <td>Full Name</td>
    <td>Relationship</td>
    <td>Gender</td>
    <td>&nbsp;</td>
  </tr>
  
  <?php while($row=mysqli_fetch_assoc($results)){?>
  <tr>
    <td align="center">
   <?php
 $image='images.png'; 
 if($row['photo'] !=""){
	 $image=$row['photo'];
 }
 ?>
 <img src="photo/<?php echo $image; ?>" width="50" height="50"  /> </td>


    <td><?php echo $row['p_title'];?></td>
    <td><?php echo $row['p_fname']." ".$row['p_lname'];?> </td>
    <td><?php echo $row['p_relationship'];?></td>
    <td><?php echo $row['p_gender'];?></td>
    
    <td align="center">


    <a href="fullviewparent.php?p_id=<?php echo $row['p_id'];?>">
<img src="../../images/full.jpg"  width="30px" height="30px" alt="Edit" /></a>

    <a href="editparent.php?p_id=<?php echo $row['p_id'];?>">
<img src="../../images/edit.png"  width="30px" height="30px" alt="Edit" /></a>

<?php if ($row['p_id']!=$p_id) {?>
   
    <a href="deleteparent.php?p_id=<?php echo $row['p_id'];?>&action=Delete" onclick="return getConfirm('Delete')">
<img src="../../images/delete.png"  width="30px" height="30px" />    </a>

    <?php if($row['p_status'] =="Active"){?>
    <a href="deleteparent.php?p_id=<?php echo $row['p_id'];?>&action=Deactivate" onclick="return getConfirm('Deactivate')">
<button type="button" class="btn btn-warning">Deactivate</button>    </a>
   <?php } else { ?>
    <a href="deleteparent.php?p_id=<?php echo $row['p_id'];?>&action=Activate" onclick="return getConfirm('Activate')">
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
    <li><a href="parent.php?page=<?php echo $i ?>">
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