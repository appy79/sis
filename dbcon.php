<?php
	
	$con=mysqli_connect('localhost','root','','sms');

$cstn="
create table if not exists student(
id int(3) auto_increment,
rollno int(8),
name text(40),
city text(40),
pcont varchar(15),
standard int(2),
image varchar(50),
PRIMARY KEY ( id ));";
$run=mysqli_query($con,$cstn);
?>