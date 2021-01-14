<head>

<?php
	
	include('adminhead.php');

	include('../dbcon.php');

	$sid=$_GET['sid'];
    
    $simg=$_GET['simg'];
    
	$sql="select * from student where id='$sid';";

	$run=mysqli_query($con,$sql);
	
	$data=mysqli_fetch_assoc($run);
	
	
?>

<title>Update Form</title>

</head>
<body class="update-body">
<?php include('menu.php'); ?>
<div class="divi">
		<form action="updatedata.php" method="post" enctype="multipart/form-data">
			<table align="center" bgcolor="#ffffff">
					<tr>
						<th>Roll No.</th>
						<td><input type="text" name="txtroll" value="<?php echo $data['rollno']; ?>" required></td>
					</tr>

					<tr>
						<th>Name</th>
						<td><input type="text" name="txtname" value="<?php echo $data['name']; ?>" required></td>
					</tr>

					<tr>
						<th>City</th>
						<td><input type="text" name="txtcity" value="<?php echo $data['city']; ?>" required></td>
					</tr>

					<tr>
						<th>Contact No.</th>	
						<td><input type="text" name="txtpcont" value="<?php echo $data['pcont']; ?>" required></td>
					</tr>

					<tr>
						<th>Semester</th>
						<td><input type="text" name="txtstd" value="<?php echo $data['standard']; ?>" required></td>
					</tr>

					<tr>
						<td colspan="2" align="center">
							<input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
							<button type="submit" name="submit" value="Update">Submit</button>
						</td>
					</tr>
			</table>
		</form>
	</div>
</body>
