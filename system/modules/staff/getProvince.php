<?php

$district_id=$_GET['q'];
include("../../common/dbconnection.php");

$sql="SELECT * FROM district d,province p WHERE d.province_id=p.province_id AND d.district_id='$district_id'";
$results=mysqli_query($con,$sql);//To execute query
$row=mysqli_fetch_assoc($results);
echo $row['province_name'];





?>