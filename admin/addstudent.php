<head>
<link rel='stylesheet' id='custom-css'  href='../assets/css/style.css' type='text/css' media='all' />
<title>Insert</title>
</head>
<body class="add-body">
	<?php include('menu.php'); ?>
	<div class="divi">
		<form action="addstudent.php" method="post" enctype="multipart/form-data">
			<table align="center" bgcolor="#ffffff">
					<tr>
						<th>Roll No.</th>
						<td><input type="text" name="txtroll" placeholder="Enter Roll No."></td>
					</tr>

					<tr>
						<th>Name</th>
						<td><input type="text" name="txtname" placeholder="Enter your name"></td>
					</tr>

					<tr>
						<th>City</th>
						<td><input type="text" name="txtcity" placeholder="Enter your city"></td>
					</tr>

					<tr>
						<th>Contact No.</th>	
						<td><input type="text" name="txtpcont" placeholder="Enter your contact no."></td>
					</tr>

					<tr>
						<th>Semester</th>
						<td><input type="text" name="txtstd" placeholder="Enter your Sem No"></td>
					</tr>

					<tr>
						<th>Image</th>
						<td><input type="file" name="simg" required></td>
					</tr>

					<tr>
						<td colspan="2" align="center"><button type="submit" name="submit" value="Submit">Submit</button></td>
					</tr>
			</table>
		</form>
		</div>
</body>		
</html>


<?php

	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
		
			$rollno=$_POST['txtroll'];
			$name=$_POST['txtname'];
			$city=$_POST['txtcity'];
			$pcon=$_POST['txtpcont'];
			$std=$_POST['txtstd'];

			$imagename=$_FILES['simg']['name'];
			$tempname=$_FILES['simg']['tmp_name'];
				
		
			move_uploaded_file($tempname,"../dataimg/$imagename");
			

		$sql="INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standard`, `image`) VALUES ('$rollno','$name','$city','$pcon','$std','$imagename')";
		$run=mysqli_query($con,$sql);
		
		if($run==true)
		{
			?>
				<script language="javascript">
					alert('Data Inserted Successfully. . .');
				</script>
			<?php	
		}
		else
		{
			?>
			<script>
				alert('Insert Failed!!');
			</script>		
		<?php
		}
	}

?>