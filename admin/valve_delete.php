<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
		$vid=$_GET['id'];
		include 'connect.php';
		$sql = "DELETE FROM valve WHERE vid=$vid";
		$result = mysqli_query($con,$sql);
		if(!$result)
		{
			 die("Some problem in Deleting. Please try again later.");
			//exit;
		}
	header('Location: valve.php' ) ;
?>