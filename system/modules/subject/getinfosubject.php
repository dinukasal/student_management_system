<?php 
$cur_id=$_REQUEST['q'];

include("../../common/dbconnection.php");

$sql="SELECT * FROM curriculum cu,grade_curriculum gc,grade g WHERE g.gr_id=gc.gr_id AND gc.cur_id=cu.cur_id AND cu.cur_id='$cur_id'";
$result=mysqli_query($con,$sql);


?>
<html>
<head></head>
<body>
<table align="center" table width="35%" border="0">
<tr>
<td>Grade : </td>
<td><select class="form-control" id="grade_select" onChange="showsubjects()">
      <option value="">Select a Grade</option>
<?php while($row=mysqli_fetch_array($result)){ ?>
<option value="<?php echo $row['gr_name']; ?>"><?php echo $row['gr_name'];?></option>
<?php }?>
</select></td>
</tr> 
 </table>
 
       <div>&nbsp;</div>
       <div>&nbsp;</div>
        <div>&nbsp;</div>

 
</div>
  <p>&nbsp;</p>
    </div>
  
       </div>
<script src="../../js/jquery-1.12.2.min.js"></script>

  <script type="text/javascript">
  
	  
	  </script>
 </body>
</html>


