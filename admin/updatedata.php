<?php

		include('../dbcon.php');
		
			$rollno=$_POST['txtroll'];
			$name=$_POST['txtname'];
			$city=$_POST['txtcity'];
			$pcon=$_POST['txtpcont'];
			$std=$_POST['txtstd'];
			$id=$_POST['sid'];

			$imagename=$_FILES['simg']['name'];
			$tempname=$_FILES['simg']['tmp_name'];
				
		
			move_uploaded_file($tempname,"../dataimg/$imagename");
			

		$sql="UPDATE `student` SET `rollno`='$rollno',`name`='$name',`city`='$city',`pcont`='$pcon',`standard`='$std',`image`='$imagename' WHERE `id`=$id;";
		$run=mysqli_query($con,$sql);
		
		if($run==true)
		{
			?>
				<script language="javascript">
					alert('Data Updated Successfully. . .');
					window.open('updateform.php?sid=<?php echo $id; ?>','_self');
				</script>
			<?php	
		}
		else
		{
			?>
			<script>
				alert('Update Failed!!');
			</script>		
		<?php
		}


?>