<?php


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
//$gr_id=$_REQUEST['q'];
//$q = intval($_GET['q']);

//mysqli_select_db($con,"getinfoclass");

//$sqlc="SELECT * FROM class c, grade_curriculum gc, grade g WHERE g.gr_id=gc.gr_id AND c.gr_id=g.gr_id AND c.gc_id=gc.gc_id AND cl_id='$cl_id'";
$sqlc= "SELECT * FROM class";
$resultc = mysqli_query($con,$sqlc);


?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Class Management</title>

<script type="text/livescript">
function getConfirm(msg) {
var res=confirm("Do You Want to"+msg+" Class"); // parameter passing dalete, activate,deactivate
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
       <h2 align="center">Class Management</h2>
       <hr />
       
       <div style="float:left; width:40%; padding-left:30px;">
       
        <a href="addclass.php"><button type="button" class="btn btn-warning">Add</button></a>
  
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
        
       <div style="float:right; padding-right:30px;">
<form action="searchclass.php" method="post">
        <input type="text" name="search" required="required"/>
       <button type="submit" class="btn btn-warning">Search</button>
       </form>
       
       </div>
       
       <div>&nbsp;</div>
       <div>&nbsp;</div>
        <div>&nbsp;</div>
        
        
  <!---selection of curriculum----->



  <!---Class Table----->
  
  
   <div class="cl_info">
<form method="post" action="class.php?cl_id=cl_id" enctype="multipart/form-data">
  <table width="90%" border="1" class="table  table-hover"  >
  <tr>
    <td >Class Name</td>
    <td >Class Location</td>
    <td >Class Teacher</td>
    <td >No of Students</td>
    <td >Descrpion</td>
    <td >&nbsp;</td>
  </tr>
  
  <?php while($rowc=mysqli_fetch_assoc($resultc)){?>
  <tr>
  

    <td><?php echo $rowc['cl_name'];?></td>
    <td><?php echo $rowc['cl_location'];?></td>
    <td><?php echo $rowc['cl_teacher'];?></td>
    <td align="center"><?php echo $rowc['no_of_students'];?></td>
    <td style="text-align:justify"><?php echo $rowc['cl_description'];?></td>
    
    <td align="center">



    <a href="editclass.php?cl_id=<?php echo $rowc['cl_id'];?>">
<img src="../../images/edit.png"  width="30px" height="30px" alt="Edit" /></a>


   
    <a href="deleteclass.php?cl_id=<?php echo $rowc['cl_id'];?>&action=Delete" onclick="return getConfirm('Delete')">
<img src="../../images/delete.png"  width="30px" height="30px" />    </a>

    <?php if($rowc['cl_status'] =="Active"){?>
    <a href="deleteclass.php?cl_id=<?php echo $rowc['cl_id'];?>&action=Deactivate" onclick="return getConfirm('Deactivate')">
<button type="button" class="btn btn-success">Deactivate</button>    </a>
   <?php } else { ?>
    <a href="deleteclass.php?cl_id=<?php echo $rowc['cl_id'];?>&action=Activate" onclick="return getConfirm('Activate')">
<button type="button" class="btn btn-warning">Activate</button>    </a>
  <?php } 
  ?>

    </td>
     
 </tr>
  
  <?php }?>
 
</table>
</form>


</div>












<div id="newfooter"><?php include "../../common/newfooter.php";?></div>
       
  </div>      
    
 <script type="text/javascript">


function showclass(sc) {
        if (sc == "") {
          document.getElementById("resultc_table").innerHTML = "";
          return;
        }
        else {
          if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
          }
          else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("resultc_table").innerHTML = xmlhttp.responseText;
            }
          };
          xmlhttp.open("GET","getinfoclass.php?r="+sc,true);
          xmlhttp.send();
        }
      }


</script>  
</div> 
</body>
</html>