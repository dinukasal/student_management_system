<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../system/css/main.css" type="text/css" rel="stylesheet"/>
<link href="../school photos/logo.jpg"rel="icon"/>
<link href="../../system/css/style.css" type="text/css" rel="stylesheet"/>



<title>Student Management System-login</title>
</head>

<body>

<div id="main">
  
  <div id="topbar">
  </div>

  <div id="logo" align="center">
  <img height="100px" width="100px" src="../school photos/logo.jpg"/>
  </div>
  
  <div id="header">
  <p class="head">Royal High School</p>
  </div>
    
  <div id="navi"></div>
 
  <div id="content">
  <div class="login-card">
  <h1>Login</h1>
       <p class="error-msg" id="msg">
         <?php
		 if(isset($_REQUEST['msg'])){
			 echo $_REQUEST['msg']; 
		 }// display the error msg
		 ?>
       </p>

  <form method="post" action="loginvalidate_student.php" onSubmit="return validate()" >
  <img src="../../images/eml.png" width="15" height="15" ><label class="sr-only">     Enter User Name</label>
       <input   type="text" name="s_uname" id="s_uname" placeholder="User Name" class="form-control">
    <img src="../../images/passworrrd.png" width="15" height="15" >
<label>    Enter Your Password</label>
       <input type="password" name="s_password" id="s_password" placeholder="Password"/>
       <input type="submit" name="login" class="login login-submit"/>
   
<a href="login/forgotpassword.php">Forgot your Password?</a>

</form>
      
   </div>
   
    
  </div>
  
     <p align="center"><img src="../../images/homeicon.png" width="40px" height="40px"></p> 
    
    <div id="footer">
    <p  class="foot" align="center"> &copy;Royal High School <br/> All rights reserved </p>
     

    </div>


  
  
</div>


</body>
</html>