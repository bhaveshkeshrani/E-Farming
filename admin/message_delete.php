<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
		$mid=$_GET['mid'];
		
		include 'connect.php';
		$sql = "DELETE FROM message WHERE mid=$mid";
		$result = mysqli_query($con,$sql) or die("please");
		if(!$result)
		{
			 die("Some problem in Deleting. Please try again later.");
			//exit;
		}
	

	header('Location: message.php' ) ;
?>