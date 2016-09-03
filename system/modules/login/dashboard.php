<?php
if(!isset($_SESSION)){
	session_start();
}
if($_SESSION['st_id']==""){//to restrict if you are not loging as a user
	$msg="Please Login to the system!!";
	header("Location:../login/index.php?msg=$msg");	
	exit();
}
$user_info=$_SESSION['user_info'];
$st_fname=$user_info['st_fname'];
$st_lname=$user_info['st_lname'];
$st_r_name=$user_info['st_r_name'];// Staff role name
$st_r_id=$user_info['st_r_id'];//Staff Role ID
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Student Management System-dashboard</title>
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="../../css/newlayout.css" type="text/css" />
<link rel="icon" href="../../images/logo.jpg"/>
</head>

<body>
<div id="newmain">

	<div id="newheader">
   <?php 
 include "../../common/newheader.php";
 ?>
   </div>
    
    <div id="newnavi">
 <?php echo " You're logged as : ". $st_fname." ".$st_lname;?>
 <a class="a1" href="logout.php">Logout</a>
       
  </div> 
    
   <div id="newcontent">
   <h2 align="center">
  <?php echo $st_r_name; ?>
  Dashboard</h2>
    <br /> 
   <hr color="#005279" />
    
   <br />
    
    
<!--admin starts-->
     <?php
	  if($st_r_id==1){ ?>
 <table width="80%" align="center">
    <tr align="center">
    	<td>
        <img src="../../images/staff.png" width="75" height="75"  /> <br />
        <a href ="../staff/staff.php">Staff Management</a></td>
        
        <td>
        <img src="../../images/curriculum.png" width="75" height="75"  /> <br />
        <a href="../curriculum/curriculum.php">Curriculum Management</a></td>
      
        <td>
       <img src="../../images/grade.jpg"width="75" height="75"  /> <br /> 
        <a href="../grade/grade.php">Grade Management</a></td>
        
        <td>
      
        <td>
       <img src="../../images/class.png" width="75" height="75"  /> <br /> 
        <a href="../class/class.php">Class Management</a></td>
        
        <td>
         <img src="../../images/subject.jpg" width="75" height="75"  /> <br />
        <a href="../subject/subject.php">Subject Management</a>      </td>
         

        
        </tr>
        
           
  </table>
 
 <br />
 <br />
 <br />
          
     <table width="80%" align="center">
    <tr align="center" >
       
         <td>
       <img src="../../images/tmetable.png" width="75" height="75"  /> <br />
        <a href="../timetable/timetable.php">Time Table Management</a></td>
        </td>
                <td>
         <img src="../../images/payment.png" width="75" height="75"  /> <br />
        <a href="../payment/payment.php">Class Payment Management</a></td>
        </td>
        
         <td>
       <img src="../../images/registration.jpg"width="75" height="75"  /><br /> 
        <a href="../student/student.php">Student Registration  Management</a></td>
        </td>
        
        <td>
         <img src="../../images/parent.png" width="75" height="75"  /> <br />
        <a href="../parent/parent.php">Parent Management</a>
        </td>
         
        <td>
       <img src="../../images/exam.jpg" width="75" height="75"  /> <br />
        <a href="../exam/exam.php">Exam Management</a></td>
        </td>
        
        <td>
        <img src="../../images/report.png" width="75" height="75"  /> <br /> 
        <a href="../report/report.php">Report Management</a>
        </td>
       
       </tr>
  
    <tr><td colspan="10" style="height:50px"><hr color="#400000" />&nbsp;</td></tr>
  
    </table>
    
    
    
     <!--admin ends-->
    
   
    <?php } 
	?>
   
     
     
          <!--staff starts-->
          
          <!--principal starts-->
          <?php 
	
	if($st_r_id==2){ ?>
  
    <table width="80%" align="center">
    <tr align="center" >
        <td>
        <img src="../../images/staff.png" width="75" height="75"  /><br/> 
        <a href="../staff/staff.php">Staff Management</a></td>
        <td>
        <img src="../../images/curriculum.png" width="75" height="75" /><br/>
        <a href="../curriculum/curriculum.php">Curriculum Management</a></td>
        </td>
        <td>
       <img src="../../images/class.png" width="75" height="75"  /> <br/>
        <a href="../class/class.php">Class Management</a></td>
        <td>
         <img src="../../images/subject.jpg" width="75" height="75"  /> <br/>
        <a href="../subject/subject.php">Subject Management</a></td>
         <td>
       <img src="../../images/tmetable.png" width="75" height="75"  /> <br/>
        <a href="../timetable/timetable.php">Time Table Management</a></td>
        </td>
  </table>
        <br /> 
        <br /> 
        <br /> 
       
        <table width="80%" align="center">
    <tr align="center" >
        <td>
         <img src="../../images/payment.png" width="75" height="75"  /> <br/>
        <a href="../payment/payment.php">Class Payment Management</a></td>
        </td>
         <td>
       <img src="../../images/registration.jpg"width="75" height="75"  /> <br/>
        <a href="../student/student.php">Student Registration Management</a></td>
        </td>
        <td>
         <img src="../../images/parent.png" width="75" height="75"  /><br/>
        <a href="../parent/parent.php">Parent Management</a>
        </td>
         <td>
       <img src="../../images/exam.jpg" width="75" height="75"  /> <br/>
        <a href="../exam/exam.php">Exam Management</a></td>
        </td>
        <td>
         <img src="../../images/report.png" width="75" height="75"  /> <br/>
        <a href="../report/report.php">Report Management</a>
        </td>
       
       </tr>
  
   <tr><td colspan="10" style="height:50px"><hr color="#400000" />&nbsp;</td></tr>
   
    </table>
    
     <!--principal ends-->
    
    <?php } 
	?>
   
 
     
      <!--vice principal starts-->
      <?php 
	
	if($st_r_id==3){ ?>
    
       
    <table width="80%" align="center">
    <tr align="center" >
        <td>
        <img src="../../images/staff.png" width="75" height="75"  /> <br/>
        
        <a href="../staff/staff.php">Staff Management</a></td>
        <td>
        <img src="../../images/curriculum.png" width="75" height="75"  /><br/>
        <a href="../curriculum/curriculum.php">Curriculum Management</a>
        </td>
        <td>
       <img src="../../images/class.png" width="75" height="75"  /> <br/>
        <a href="../class/class.php">Class Management</a></td>
        </td>
        <td>
         <img src="../../images/subject.jpg" width="75" height="75"  /> <br/>
        <a href="../subject/subject.php">Subject Management</a></td>
        </td>
         <td>
       <img src="../../images/tmetable.png" width="75" height="75"  />  <br/>
        <a href="../timetable/timetable.php">Time Table Management</a></td>
        </td>
  </table>
        
        <br /> 
        <br /> 
        <br /> 
        
        <table width="80%" align="center">
    <tr align="center" >
        <td>
         <img src="../../images/payment.png" width="75" height="75"  /> <br/>
        <a href="../payment/payment.php">Class Payment Management</a>
        </td>
         <td>
       <img src="../../images/registration.jpg"width="75" height="75"  />  <br/>
        <a href="../studen/student.php"></a>Student Registration Management</td></td>
        </td>
        <td>
         <img src="../../images/parent.png" width="75" height="75"  />  <br/>
        <a href="../parent/parent.php">Parent Management</a>
        </td>
         <td>
       <img src="../../images/exam.jpg" width="75" height="75"  /> <br/> 
        <a href="../exam/exam.php">Exam Management</a></td>
        </td>
        <td>
         <img src="../../images/report.png" width="75" height="75"  />  <br/>
        <a href="../report/report.php">Report Management</a>
        </td>
       
         </tr>
            
   <tr><td colspan="10" style="height:50px"><hr color="#400000" />&nbsp;</td></tr>
  
    </table>
    
    <?php } 
	?>
 <!--vice principal ends-->
     
     
     
     
 <!--sectional head starts-->
 <?php 
	
	if($st_r_id==4){ ?>
    
    <table width="80%" align="center">
    <tr align="center" >
        <td>
        <img src="../../images/staff.png" width="75" height="75"  /> <br/>
        
        <a href="../staff/staff.php">Staff Management</a></td>       <td>
        <img src="../../images/curriculum.png" width="75" height="75"  /> <br/>
        <a href="../curricumum/curriculum.php">Curriculum Management</a></td>
        </td>
        <td>
       <img src="../../images/class.png" width="75" height="75"  /> <br/>
        <a href="../class/class.php">Class Management</a></td>
        </td>
        <td>
         <img src="../../images/subject.jpg" width="75" height="75"  /> <br/>
        <a href="../subject/subject.php">Subject Management</a>
        </td>
         <td>
       <img src="../../images/tmetable.png" width="75" height="75"  /> <br/>
        <a href="../timetable/timetable.php">Time Table Management</a>
        </td>
        </tr>
  </table>
        <br /> 
        <br /> 
        <br /> 
        
      <table width="80%" align="center">
    <tr align="center" >
        <td>
         <img src="../../images/payment.png" width="75" height="75"  /> <br/>
        <a href="../payment/payment.php">Class Payment Management</a>
        </td>
         <td>
       <img src="../../images/registration.jpg"width="75" height="75"  /> <br/>
        <a href="../student/student.php">Student Registration Management</a></td>
        </td>
        <td>
         <img src="../../images/parent.png" width="75" height="75"  /> <br/>
        <a href="../parent/parent.php">Parent Management</a>
        </td>
         <td>
       <img src="../../images/exam.jpg" width="75" height="75"  /> <br/> 
        <a href="../exam/exam.php">Exam Management</a></td>
        </td>
        <td>
         <img src="../../images/report.png" width="75" height="75"  /> <br/>
        <a href="../report/report.php">Report Management</a>
        </td>
       
    </tr>
   
   <tr><td colspan="10" style="height:50px"><hr color="#400000" />&nbsp;</td></tr>
  
    </table>
    
    <?php } 
	?>
 <!--sectional head ends-->
     
      
<!--teacher starts-->
<?php 
	
	if($st_r_id==5){ ?>
     
    <table width="80%" align="center">
    <tr align="center" >
        <td>
        <img src="../../images/staff.png" width="75" height="75"  /> <br/>
        
        <a href="../staff/staff.php">Staff Management</a></td>
        <td>
        <img src="../../images/curriculum.png" width="75" height="75"  /> <br />
        <a href="../curricumum/curriculum.php">Curriculum Management</a></td>
        <td>
       <img src="../../images/class.png" width="75" height="75"  /> <br/>
        <a href="../class/class.php">Class Management</a></td>
        </td>
        <td>
         <img src="../../images/subject.jpg" width="75" height="75"  /> <br/>
        <a href="../subject/subject.php">Subject Management</a>
        </td>
         <td>
       <img src="../../images/tmetable.png" width="75" height="75"  /> <br/>
        <a href="../timetable/timetable.php">Time Table Management</a></td>
       </tr>
       
        
  </table>
        <br /> 
        <br /> 
        <br /> 
        <br /> 
        <table width="80%" align="center">
    <tr align="center" >
        <td>
         <img src="../../images/payment.png" width="75" height="75"  /> <br />
        <a href="../payment/payment.php">Class Payment Management</td>
        </td>
         <td>
       <img src="../../images/registration.jpg"width="75" height="75"  /> <br />
        <a href="../student_registration/student_registration.php">Student Registration Management</td></td>
        </td>
        <td>
         <img src="../../images/parent.png" width="75" height="75"  /> <br />
        <a href="../parent/parent.php">Parent Management</td>
        </td>
         <td>
       <img src="../../images/exam.jpg" width="75" height="75"  /> <br />
        <a href="../exam/exam.php">Exam Management</td></td>
        </td>
        <td>
         <img src="../../images/report.png" width="75" height="75"  /> <br />
        <a href="../report/report.php">Report Management</td>
        </td>
       
        </tr>
        
        <tr><td colspan="15" style="height:50px"><hr color="#400000" />&nbsp;</td></tr>
  
    </table>
    
     <?php } 
	?>
     <!--teacher ends-->
  
       
    
    </div>
    <div id="newfooter">
    <?php	include "../../common/newfooter.php"; ?>
    </div>
</div>
</body>
</html>