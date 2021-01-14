<?php

session_start();
if(!$_SESSION['uid'])
{
			header('location: ../login.php');
}

?>
<link rel='stylesheet' id='custom-css'  href='../assets/css/style.css' type='text/css' media='all' />