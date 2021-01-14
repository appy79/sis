<html>
	<head>
		<title>Welcome to SMS</title>
		<link rel='stylesheet' id='custom-css'  href='assets/css/style.css' type='text/css' media='all' />
	</head>
	
	<body class="home-body">
		
		<h1 align="center" style="color:#FFFFFF;">Student Management System</h1>

        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="admin/addstudent.php">Insert Student Detail</a></li>
            <li><a href="admin/editstudent.php">Edit Student Detail</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="admin/admindash.php">Dashboard</a></li>
            <li style="float:right"><a href="" class="name"><?php echo basename($_SERVER['PHP_SELF']); ?></a></li>
        </ul>

		<div class="divi">
		
		<form name="myform" action="index.php" method="post">
			<table align="right" class="tabi" id="tabl">
			<tr class="tre">
				<th align="right" style="padding-right: 1%;">Semester</th>
				<td>
					<?php
							include('dbcon.php');

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
			</tr>
			<tr class="tre">
				<th>Student Name</th>
				<td><input type="text" name="stuname" placeholder="Enter Student Name" required="required"></td>
			</tr>
			<tr class="tre">
				<td colspan="2" align="center"><button type="submit" name="cmdSearch" value="search">Find</td>
			</tr>
		</form>
	</table>
</form>
</div>

	<?php

		if(isset($_POST['cmdSearch']))
		{
			include('dbcon.php');

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
			{ ?>
				<script language="javascript">
					</script>
					<?php
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
					</tr>
					<tr style="background-color:#fff; color:#000;">
						<td align="center"><b><?php echo $count; ?></b></td>
						<td align="center"><b><?php echo $data['rollno']; ?></b></td>
						<td align="center"><b><?php echo $data['name']; ?></b></td>
						<td align="center"><b><?php echo $data['city']; ?></b></td>
						<td align="center"><b><?php echo $data['pcont']; ?></b></td>
						<td align="center"><b><?php echo $data['standard']; ?></b></td>
						<td  align="center"><img src="dataimg/<?php echo $data['image']; ?>" style="height: 125px"></td>
					</tr>
				<?php
				}
			}
		}

	?>
	</table>
	</body>
</html>
