<?php
session_start();


include('dbcon.php');
	
	if(isset($_SESSION["uid"])){
		
		header("location: admin/admindash.php");
	
	}

		

?>



<html>
	<head>
		<title>Log In</title>
		<link rel='stylesheet' id='custom-css'  href='assets/css/style.css' type='text/css' media='all' />
		<link rel='stylesheet' id='custom-login-pages-css'  href='assets/css/login.css' type='text/css' media='all' />
	</head>
	<body class="login login-action-login main">
		<div id="login">
			<h1><a href="index.php" title="logo" tabindex="-1">Logo</a></span></h1>
			<form name="loginform" id="loginform" action="login.php" method="post" class="appy-login">
				<div class="appy-login__input">
					<span class="icon ion-person"></span>
					<input type="text" name="uname" id="user_login" class="input" value="" size="20" placeholder="Enter Username" />
				</div>
				<div class="appy-login__input">
					<span class="icon ion-locked"></span>
					<input type="password" name="upass" id="user_pass" class="input" value="" size="20" placeholder="Enter Password" />
				</div>
				<p class="submit appy-login__submit">
					<input type="submit" name="submit" id="submit" class="button button-primary button-large" value="Log In" style="text-align: center">
				</p>
			</form>

			<p id="nav">
				<a href="">Lost your password, huh?</a>
			</p>



			<p id="back"><a href="index.php">&larr; Back to SMS</a></p>
				
		</div>

		<div class="clear"></div>
	
</body>
</html>


<?php

        if(isset($_POST["submit"])){

		$username=$_POST['uname'];
		
		$password=$_POST['upass'];

		$sql="select * from admin where username='$username' and password='$password';";
	 
		$run=mysqli_query($con,$sql);

		$row=mysqli_num_rows($run);

		if($row<1){
			?>
			<script type="text/javascript">
				alert("Username and Password do not match");
			</script>
			<?php

		}

		else{

			$data=mysqli_fetch_assoc($run);

			$id=$data['id'];

			$_SESSION['uid']=$id;

			header("location: admin/admindash.php");

		}

	}



?>



