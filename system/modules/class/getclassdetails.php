<?php

$curriculum=$_POST["curriculum"];
$grade=$_POST["grade"];


include("../../common/dbconnection.php");

$sql="SELECT * from class c,grade_curriculum gc where c.gr_id='".$grade."' and gc.gr_id='".$grade."' and gc.cur_id='".$curriculum."'";



$resultc=mysqli_query($con,$sql);

?>


<div class="cl_info" style="">
<form method="post" action="class.php?cl_id=cl_id" enctype="multipart/form-data">
  <table width="90%" border="1" class="table  table-hover"  >
  <tr>
    <td >Class Name</td>
    <td >Class Location</td>
    <td >Class Teacher</td>
    <td >No of Students</td>
    <td >Descrpion</td>
    <td >&nbsp;</td>
  </tr>
  
  <?php while($rowc=mysqli_fetch_assoc($resultc)){?>
  <tr>
  

    <td align="center"><?php echo $rowc['cl_name'];?></td>
    <td><?php echo $rowc['cl_location'];?></td>
    <td><?php echo $rowc['cl_teacher'];?></td>
    <td align="center"><?php echo $rowc['no_of_students'];?></td>
    <td style="text-align:justify"><?php echo $rowc['cl_description'];?></td>
    
    <td align="center">



    <a href="editclass.php?cl_id=<?php echo $rowc['cl_id'];?>">
<img src="../../images/edit.png"  width="30px" height="30px" alt="Edit" /></a>


   
    <a href="deleteclass.php?cl_id=<?php echo $rowc['cl_id'];?>&action=Delete" onclick="return getConfirm('Delete')">
<img src="../../images/delete.png"  width="30px" height="30px" />    </a>

    <?php if($rowc['cl_status'] =="Active"){?>
    <a href="deleteclass.php?cl_id=<?php echo $rowc['cl_id'];?>&action=Deactivate" onclick="return getConfirm('Deactivate')">
<button type="button" class="btn btn-success">Deactivate</button>    </a>
   <?php } else { ?>
    <a href="deleteclass.php?cl_id=<?php echo $rowc['cl_id'];?>&action=Activate" onclick="return getConfirm('Activate')">
<button type="button" class="btn btn-warning">Activate</button>    </a>
  <?php } 
  ?>

    </td>
     
 </tr>
  
  <?php }?>
 
</table>
</form>


</div>