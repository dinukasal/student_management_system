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
      <form action="" method="post">
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
                        </div></form>
      <div>&nbsp;</div>
      
      
      </div>  
      
          </div>




	<div id="newheader">
   </div>
    


              <div id="newnavi">
 <?php echo " You're logged as : ". $s_fname." ".$s_lname;?>(student)
 <a class="a1" href="logout.php">Logout</a>
       
  </div> 
  
          
   <br> 
    <p style="margin-left:2%" >Print: <span class="glyphicon glyphicon-print" onclick="alert('ok')"></span></p>


    <!-- Page Content -->
    <div class="container">
                    <h2 class="page-header" align="center" style="color:#D56A00" >Subjects</h2>

                
   <table width="80%" align="center">
    <tr align="center">
    	<td width="24%">
        <a href ="myprofile.php"><img src="../school photos/profile.jpg" width="75" height="75" class="img-thumbnail" /></a> <br />
        <h4>My Profile</h4></td>
        
        <td width="25%">
        <a href="../curriculum/curriculum.php"><img src="../school photos/subject.jpg" width="75" height="75" class="img-thumbnail" /></a> <br />
        <h4>Subjects</h4></td>
      
            <td width="25%">
        <a href="../curriculum/curriculum.php"><img src="../school photos/schedule-icon.png" width="75px" height="75px" class="img-thumbnail" /></a> <br />
        <h4>Schedules</h4></td>
   
        
                <td width="26%">
        <a href="../curriculum/curriculum.php"><img src="../school photos/tmetable.png" width="75" height="75" class="img-thumbnail" /></a> <br />
        <h4>Time Table</h4></td>

         

        
        </tr>
        
           
  </table>
 
 <br />
 <br />
 <br />
          
     <table width="80%" align="center">
    <tr align="center" >
       
         <td width="25%">
        <a href="../curriculum/curriculum.php"><img src="../school photos/results.png" width="75" height="75" class="img-thumbnail" /></a> <br />
        <h4>Results</h4></td>
        <td width="0%"></td>
                
                <td width="24%">
        <a href="../curriculum/curriculum.php"><img src="../school photos/payment.png" width="75" height="75" class="img-thumbnail" /></a> <br />
        <h4>Payments</h4></td>
        <td width="0%"></td>
        
       <td width="25%">
        <a href="../curriculum/curriculum.php"><img src="../school photos/event.png" width="75" height="75" class="img-thumbnail" /></a> <br />
        <h4>School Events</h4></td>
        
        <td width="0%"></td>
        
        <td width="26%">
        <a href="../curriculum/curriculum.php"><img src='../school photos/communication.png' width="75" height="75" class="img-thumbnail" /></a> <br />
        <h4>Forum</h4></td>
       
       </tr>
  
    <tr><td colspan="10" style="height:50px"><hr color="#400000" />&nbsp;</td></tr>
  
    </table>
    

</div>

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row" >
<a class="btn btn-lg btn-default btn-block" href="#">Go up</a>                                <!-- Footer -->
		<?php
			include '../footer.html';
		?>
                    
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
