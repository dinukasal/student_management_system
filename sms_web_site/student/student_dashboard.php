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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Student Management System-student dashboard</title>
<link rel="stylesheet" href="../../system/bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="../../system/css/newlayout.css" type="text/css" />
<link rel="icon" href="../../system/images/logo.jpg"/>
</head>

<body>
<div id="newmain">

	<div id="newheader">
   <?php 
 include "../../system/common/newheader.php";
 ?>
   </div>
    
    <div id="newnavi">
 <?php echo " You're logged as : ". $s_fname." ".$s_lname;?>
 <a class="a1" href="logout.php">Logout</a>
       
  </div> 
  


    
   <div id="newcontent">
   <h2 align="center">
  Student Dashboard</h2>
    <br /> 
   <hr color="#005279" />
    
   <br />

 <table width="80%" align="center">
    <tr align="center">
    	<td width="20%">
        <img src="../school photos/profile.jpg" width="75" height="75"  /> <br />
        <a href ="../staff/staff.php">My Profile</a></td>
        
        <td width="22%">
        <img src="../../system/images/curriculum.png" width="75" height="75"  /> <br />
        <a href="../curriculum/curriculum.php">Curriculum Management</a></td>
      
       
      
        <td width="25%">
       <img src="../../images/class.png" width="75" height="75"  /> <br /> 
        <a href="../class/class.php">Class Management</a></td>
        
        <td width="33%">
         <img src="../../images/subject.jpg" width="75" height="75"  /> <br />
        <a href="../subject/subject.php">Subject Management</a>      </td>
         

        
        </tr>
        
           
  </table>
 
 <br />
 <br />
 <br />
          
     <table width="80%" align="center">
    <tr align="center" >
       
         <td width="24%" align="right">
       <img src="../../images/tmetable.png" width="75" height="75"  /> <br />
        <a href="../timetable/timetable.php">Time Table Management</a></td>
        <td width="0%"></td>
                <td width="22%" align="right">
         <img src="../../images/payment.png" width="75" height="75"  /> <br />
        <a href="../payment/payment.php">Class Payment Management</a></td>
        <td width="7%"></td>
        
        <td width="18%" align="right">
       <img src="../../images/exam.jpg" width="75" height="75"  /> <br />
        <a href="../exam/exam.php">Exam Management</a></td>
        <td width="4%"></td>
        
        <td width="25%" align="right">
        <img src="../../images/report.png" width="75" height="75"  /> <br /> 
        <a href="../report/report.php">Report Management</a>
        </td>
       
       </tr>
  
    <tr><td colspan="10" style="height:50px"><hr color="#400000" />&nbsp;</td></tr>
  
    </table>
    
    
    
    
       
    
    </div>
   

    <div id="newfooter">
    <?php	include "../../common/newfooter.php"; ?>
    </div>
</div>
</body>
</html>