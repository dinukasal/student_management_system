<?php

$curriculum=$_POST["curriculum"];
$grade=$_POST["grade"];


include("../../common/dbconnection.php");

$sql="SELECT * from subject s,grade_curriculum gc where s.gr_id='".$grade."' and gc.gr_id='".$grade."' and gc.cur_id='".$curriculum."'";



$results=mysqli_query($con,$sql);

?>


<div class="sub_info" style="">
<form method="post" action="subject.php?sub_id=sub_id" enctype="multipart/form-data">
  <table width="90%" border="1" class="table  table-hover"  >
  <tr>
    <td>Subject Code</td>
    <td >Subject Title</td>
    <td >Subject Incharge</td>
    <td >Descripion</td>
    <td >&nbsp;</td>
  </tr>
  
  <?php while($rows=mysqli_fetch_assoc($results)){?>
  <tr>
  
    <td align="center"><?php echo $rows['sub_code'];?></td>
    <td><?php echo $rows['sub_title'];?></td>
    <td><?php echo $rows['sub_incharge'];?></td>
    <td style="text-align:justify"><?php echo $rows['sub_description'];?></td>



    <td align="center">

    <a href="editsubject.php?sub_id=<?php echo $rows['sub_id'];?>">
<img src="../../images/edit.png"  width="30px" height="30px" alt="Edit" /></a>
   
    <a href="deletesubject.php?sub_id=<?php echo $rows['sub_id'];?>&action=Delete" onclick="return getConfirm('Delete')">
<img src="../../images/delete.png"  width="30px" height="30px" />    </a>

    <?php if($rows['sub_status'] =="Active"){?>
    <a href="deletesubject.php?sub_id=<?php echo $rows['sub_id'];?>&action=Deactivate" onclick="return getConfirm('Deactivate')">
<button type="button" class="btn btn-success">Deactivate</button>    </a>
   <?php } else { ?>
    <a href="deletesubject.php?sub_id=<?php echo $rows['sub_id'];?>&action=Activate" onclick="return getConfirm('Activate')">
<button type="button" class="btn btn-warning">Activate</button>    </a>
  <?php } 
  ?>

    </td>
     
 </tr>
  
  <?php }?>
 
</table>
</form>


</div>