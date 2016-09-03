<?php

$curriculum=$_POST["curriculum"];
$grade=$_POST["grade"];

include("../../common/dbconnection.php");

$sql="SELECT cl_id,cl_name from class c,grade_curriculum gc where c.gr_id='".$grade."' and gc.gr_id='".$grade."' and gc.cur_id='".$curriculum."'";

$resultc=mysqli_query($con,$sql);

while($rowc=mysqli_fetch_assoc($resultc)){
?>

<option value="<?php echo $rowc["cl_id"]; ?>"> <?php echo $rowc["cl_name"]; ?> </option>;

<?php } ?>