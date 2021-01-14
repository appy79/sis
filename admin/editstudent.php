<head>
<?php

include('adminhead.php');

?>

	<title>Update</title>
</head>
<body class="edit-body">
	<?php include('menu.php'); ?>
	<div class="divi">
	<table align="center" bgcolor="#ffffff">
		<form action="editstudent.php" method="post" enctype="multipart/form-data">
			<tr>
				<th>Semester</th>
				<td>
					<?php
							include('../dbcon.php');

							$sql="SELECT DISTINCT standard FROM `student`;";
							
							$run=mysqli_query($con,$sql);
						
							$row=mysqli_num_rows($run);
							
							if($row<1)
							{
					?>
								
								<script>
									alert('No Student Records Yet.');
								</script>
					<?php
							}
							else
							{
							?>
									<select name="standard">
											<?php
														while($data=mysqli_fetch_array($run))
														{
											?>
															<option value="<?php echo $data[0];?>"><?php echo $data[0];?></option>
											<?php
														}
											?>
									</select>
					<?php			
							}
					?> 
				</td>
				
				<th>Student Name</th>
				<td><input type="text" name="stuname" placeholder="Enter Student Name" required="required"></td>
				<td colspan="2"><button type="submit" name="cmdSearch" value="search">Search</button></td>
			</tr>
		</form>
	</table>
</div>
	<?php

		if(isset($_POST['cmdSearch']))
		{

				$name=$_POST['stuname'];
				$std=$_POST['standard'];

			$sql="SELECT * FROM `student` WHERE standard=$std AND name LIKE '%$name%';";
			 	
			$run=mysqli_query($con,$sql);
			
			if(mysqli_num_rows($run)<1)
			{
				?>
					<script language="javascript">
						alert('No Record Found. . .');
					</script>
				<?php
			}
			else
			{
				$count=0;
					while($data=mysqli_fetch_assoc($run))
				{
					$count++;
				?>
					<table border="0.5" align="center" bgcolor="#00f" width="80%" style="margin-top:10px">
					<tr style="background-color:#669999; color:#000;">
						<th>Sr. No.</th>
						<th>Roll No.</th>
						<th>Name</th>
						<th>City</th>
						<th>Contact</th>
						<th>Semester</th>
						<th>Image</th>
						<th colspan="2">Action</th>
					</tr>
					<tr style="background-color:#fff; color:#000;">
						<td align="center"><b><?php echo $count; ?></b></td>
						<td align="center"><b><?php echo $data['rollno']; ?></b></td>
						<td align="center"><b><?php echo $data['name']; ?></b></td>
						<td align="center"><b><?php echo $data['city']; ?></b></td>
						<td align="center"><b><?php echo $data['pcont']; ?></b></td>
						<td align="center"><b><?php echo $data['standard']; ?></b></td>
						<td align="center"><img src="../dataimg/<?php echo $data['image']; ?>" style="height: 125px"></td>
						<td align="center"><b><a href="updateform.php?sid=<?php echo $data['id']; ?>">Edit</a></b></td>
						<td align="center"><b><a href="delete.php?sid=<?php echo $data['id']; ?>&simg=<?php echo $data['image']; ?>">Delete</a></b></td>
					</tr>
				<?php
				}
			}
		}

	?>
	</table>
</body>
</html>


