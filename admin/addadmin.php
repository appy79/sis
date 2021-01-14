<head>

<?php

include('adminhead.php');

?>
<script>
var check = function() {
  if (document.getElementById('passw').value ==
    document.getElementById('confpassw').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Passwords match';
    document.getElementById("submit").disabled = false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = "Passwords don't match";
    document.getElementById("submit").disabled = true;
  }
}
</script>
</head>
<body bgcolor="#C0C0C0">
	<?php include('menu.php'); ?>
		<form action="addadmin.php" method="post" enctype="multipart/form-data" name="addadmin">
			<table align="center" bgcolor="#ffffff" style="margin-top: 5%">
					<tr>
						<th>Name</th>
						<td><input type="text" name="name" placeholder="Enter id"></td>
					</tr>

					<tr>
						<th>Password</th>
						<td><input id="passw" type="Password" name="txtPassword" placeholder="Enter Password" onkeyup='check();' required /></td>
					</tr>
					<tr>
						<th>Confirm Password</th>
						<td><input id="confpassw" type="Password" name="txtConfirmPassword" placeholder="ReEnter Password" onkeyup='check();' required /> <span id='message'></span></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><button type="submit" name="submit" value="Submit" id="submit">Submit</button></td>
					</tr>
			</table>
		</form>
		
</body>		
</html>

<?php

	if(isset($_POST['submit']))
	{
		include('../dbcon.php');
		
			$id=$_POST['name'];
			$pass=$_POST['txtPassword'];

		$sql="INSERT INTO `admin`(`username`, `password`) VALUES ('$id','$pass')";
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