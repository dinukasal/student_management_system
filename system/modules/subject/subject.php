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

// To resrict if you are not login  as a user
if($_SESSION['st_id']==""){
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


$sqlc="SELECT *FROM curriculum WHERE cur_status='Active'";
$resultc=mysqli_query($con,$sqlc);





?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="../../images/logo.jpg" rel="icon"/>
<title>Subject Management</title>

<script type="text/livescript">
function getConfirm(msg) {
var res=confirm("Do You Want to"+msg+" subject Account"); // parameter passing dalete, activate,deactivate
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
       <h2 align="center">Subject Management</h2>
       <hr />
       
       <div style="float:left; width:40%; padding-left:30px;">
       <a href='addsubject.php'><button type="button" class="btn btn-warning">Add</button></a>
       &nbsp;&nbsp;
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
        
       <div style="float:right; padding-right:30px;">
<form action="searchsubject.php" method="post">
        <input type="text" name="search" required="required"/>
       <button type="submit" class="btn btn-warning">Search</button>
       </form>
       </div>
       <div>&nbsp;</div>
       <div>&nbsp;</div>
        <div>&nbsp;</div>
      
                   </br>
       
            <div id="row" align="center">
            
        <span id="row" class="alert_info">
         
           <?php if(isset($_REQUEST['msg'])){
                echo $_REQUEST['msg'];  
           }
           ?>&nbsp;
         </span>
     </div>
     <!----row closed--->
     

  <!---selection of curriculum----->
  
        <form method="post" action="" enctype="multipart/form-data" onSubmit="return subjectvalidation()">


 <h4><div id="bar" >Please Select a Curriculum  and a Grade to view subjects!!!</div></h4>
 
  <table width="39%" align="center">
 <tr>
 <td width="23%" >Curriculum :</td>
<td width="77%">
<select name="ctype" id="ctype" onchange="showgrade(this.value)" class="form-control" required>
          <option value="">Select a Curriculum</option>
          <?php while($rowc=mysqli_fetch_assoc($resultc)){?>
<option value="  <?php echo $rowc['cur_id'];?>">
  <?php echo $rowc['cur_name'];?></option>
    <?php } ?>
    </select> </td>
       </tr>

  </table>
  </form>

<hr/>

<div id="result_table"></div>

  <!---Display drop down list here----->


  <div id="results_table"></div>
 

  <!---Display subjects table here----->
  
  
  
  
    </div>

<div id="newfooter"><?php include "../../common/newfooter.php";?>

</div>
       
  </div>      
    <script src="../../js/jquery-1.12.2.min.js"></script>
    
 <script type="text/javascript">
	

function showgrade(sg) {
        if (sg == "") {
          document.getElementById("result_table").innerHTML = "";
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
              document.getElementById("result_table").innerHTML = xmlhttp.responseText;
            }
          };
          xmlhttp.open("GET","getinfosubject.php?q="+sg,true);
          xmlhttp.send();
        }
      }

  function showsubjects() {
        
		
		$("#grade_select").click(
		function(){
			$.ajax({
      url: "getsubjects.php",
      type: "post",
      data: {
		  curriculum: $("#ctype").val(),
          grade: $("#grade_select").val()
		  },
		  //taking into one array
  	datatype: 'json',
      success: function(data){
		$("#results_table").html(data);
      },
      error:function(){
         alert("Error!");
      }   
    }); 
		});
  }



</script>
</div>
</body>
</html>
