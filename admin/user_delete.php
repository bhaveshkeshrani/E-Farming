<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
		$id=$_GET['id'];
		
		//echo "$email $pass";
		include 'connect.php';
		$sql = "DELETE FROM admin WHERE id=$id";
		$result = mysqli_query($con,$sql);
		if(!$result)
		{
			 die("Some problem in Deleting. Please try again later.");
			//header("Location: users.php");
			//exit;
		}
	

	header('Location: users.php' ) ;
?>