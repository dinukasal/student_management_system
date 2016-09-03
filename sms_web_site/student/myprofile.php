<?php
if(!isset($_SESSION)){
	session_start();
}
if($_SESSION['s_id']==""){//to restrict if you are not loging as a user
	$msg="Please Login to the system!!";
	header("Location:indexstudent.php?msg=$msg");	
	exit();
}
$user_info=$_SESSION['user_info'];
$s_fname=$user_info['s_fname'];
$s_lname=$user_info['s_lname'];
$s_id=$user_info['s_id'];
include("../../system/common/dbconnection.php");

//$s_id = $_GET['s_id'];
$sql="SELECT * FROM student where s_id='$s_id'";
$results = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($results);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Royal High School </title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/new.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

    <!-- Navigation -->
	<?php 
		include 'header.html'
	?>
	
        </div>
    </nav>

</header>

    <div class="row">
    
    <div class="col-md-6">
                <img src="../school photos/banner.png"height="100px" width="500px"   />
                </div>
                
      <div class="col-md-2">&nbsp;</div>
      
      
      <div class="col-md-4">
      
      <div>&nbsp;</div>
      
              <button type="button" class="btn btn-primary">Need Help?</button>
              <div>&nbsp;</div>
    
                       <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
      <div>&nbsp;</div>
      
      
      </div>  
      
          </div>




    <div id="newmain">
       <div id="newheader"></div>
       <div id="newnavi">
       
       <?php include "navi.php";?>
       
       </div>
       <div id="newcontent">
       <h2 align="center">My Profile</h2>
            
       <div style="float:left; width:40%; padding-left:30px;">
       
       <a href="studentportal.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
       
         </div>
       <div>&nbsp;</div>
       <div>&nbsp;</div>
        <div>&nbsp;</div>
 
 <div class="row">
 
 <div>
 <div class="col-md-4"></div>
 <div class="col-md-4">
 
<form method="post" action="../../system/modules/student/addstudentprocess.php" enctype="multipart/form-data" onsubmit="return studentvalidation()" style="background-color:#FFC" >
      
<table width="90%" border="0" align="center" cellpadding="2" cellspacing="2" class="table table-hover" bordercolordark="#666666" >

 <tr ><td colspan="2" align="center">
     <?php
       $image='images.png'; 
       if($row['photo'] !=""){
      	 $image=$row['photo'];
       }
 ?>
 <img src="../../system/modules/student/photo/<?php echo $image; ?>" width="150" height="150"  /></td>
 </tr>

 
 <tr>
    <td colspan="1" width="17%" style="font-weight:700">Full Name :</td>
    <td width="16%" ><?php echo $row['s_fname']." ".$row['s_lname'];?></td>
</tr>
 
 <tr>
    <td height="28" style="font-weight:700">Address :</td>
    <td width="16%" ><?php echo $row['s_address1']." , ".$row['s_address2'].",".$row['s_address3']; ?></td>
 </tr>
 
 <tr>
    <td style="font-weight:700">Contact Numbers :</td>
    <td width="16%" ><?php echo $row['s_contact_no1'].",".$row['s_contact_no2']; ?></td>
 </tr>
 
 <tr>
   <td style="font-weight:700">Email Address :</td>
    <td width="16%" ><?php echo $row['s_email']; ?></td>
   </tr>
   
   <tr>
   <td style="font-weight:700">NIC :</td>
   <td width="19%" ><?php echo $row['s_NIC']; ?></td>
 </tr> 


 <tr>
    <td style="font-weight:700">DoB :</td>
    <td width="16%" ><?php echo $row['s_DoB']; ?></td>
    </tr>
    
    <tr>
    <td style="font-weight:700">Gender :</td>
    <td width="14%" ><?php echo $row['s_gender']; ?></td>

 </tr>
  
   <tr>
    <td style="font-weight:700">User Name :</td>
    <td width="16%" ><?php echo $row['s_uname']; ?></td>
    </tr>
    
    <tr>
    <td style="font-weight:700">Password :</td>
    <td width="19%" ><?php echo $row['s_password']; ?></td>
 </tr>
  
 
  
</table>
</form>
</div>

<div class="col-md-4"></div>


</div>

 </div>
 
 </div>
 
<div id="newfooter"><?php
			include '../footer.html';
		?></div>
      

    
</body>
</html>