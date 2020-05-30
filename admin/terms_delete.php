<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
		$tid=$_GET['tid'];
		
		include 'connect.php';
		$sql = "DELETE FROM terms WHERE tid=$tid";
		$result = mysqli_query($con,$sql) or die("please");
		if(!$result)
		{
			 die("Some problem in Deleting. Please try again later.");
			//exit;
		}
	

	header('Location: terms.php' ) ;
?>