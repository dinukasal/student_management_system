<?php
if(!isset($_SESSION)){
	session_start();
}
unset($_SESSION['user_info']);
unset($_SESSION['st_id']);

header("refresh:5,url=index.php");//After 5 seconds page is going to redirect into page
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/newlayout.css" type="text/css" rel="stylesheet"/>
<link href="../../images/logo.jpg" rel="icon"/>
<title>Student Management System-Logout</title>
</head>

<body>
    <div id="newmain">
       <div id="newheader"><?php include "../../common/newheader.php";?></div>
       <div id="newnavi">
       
       
       
       </div>
       <div id="newcontent">
       <h2 align="center">
       Logout</h2>
       
       <p align="center"> Successfully Logout From The System!!!<br />
       <a href="../../index.php">Login</a></p>
       
       <p align="center">
       <img width="100px" src="../../images/lout.gif"/></p>
       </p>
       </div>
       <div id="newfooter"><?php include "../../common/newfooter.php";?></div>
       
    </div>
</body>
</html>