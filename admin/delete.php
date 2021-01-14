<?php
session_start();
if(isset($_SESSION['uid']))
{
				include('../dbcon.php');

				$sid=$_GET['sid'];
                
                $simg=$_GET['simg'];
    
                unlink("../dataimg/$simg");
    
				$sql="DELETE FROM student WHERE id=$sid;";
				
				$run=mysqli_query($con,$sql);
                
				if($run==true){
					?>
				<script>
					alert('Delete Successfully');
				</script>
				<?php
				}
				
				else{
					?>
				<script>
					alert('Delete Unsuccessful');
				</script>
				<?php
				}

				header('location: editstudent.php');

}
else
	header('location: ../login.php');
?>
