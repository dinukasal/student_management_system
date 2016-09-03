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
       <hr/>
       
       <div style="float:left; width:40%; padding-left:30px;">

       <a href='addclass.php'><button type="button" class="btn btn-warning">Add</button></a>  
       <a href="../login/dashboard.php"><button type="button" class="btn btn-warning">Dashboard</button></a>
       </div>
        
       <div style="float:right; padding-right:30px;">
<form action="searchclass.php" method="post">
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
        <div>&nbsp;</div>
        
        
  <!---selection of curriculum----->

  <form method="post" action="" enctype="multipart/form-data" onSubmit="return classvalidation()">


 <h4><div id="bar" >Please Select a Curriculum  and a Grade to view classes!!!</div></h4>
 
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
  
  
  <div id="resultc_table"></div>
 

  <!---Display class table here----->

	
  <!---Class Table----->
  
  
   
  
  
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
          xmlhttp.open("GET","getinfoclass.php?q="+sg,true);
          xmlhttp.send();
        }
      }

  function showclasses() {
        
		
		$("#grade_select").click(
		function(){
			$.ajax({
      url: "getclassdetails.php",
      type: "post",
      data: {
		  curriculum: $("#ctype").val(),
          grade: $("#grade_select").val()
		  },
  	datatype: 'json',
      success: function(data){
		$("#resultc_table").html(data);
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