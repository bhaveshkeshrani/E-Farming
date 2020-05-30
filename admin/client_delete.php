<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
		$id=$_GET['id'];
		include 'connect.php';
		$sql = "DELETE FROM person WHERE pid=$id";
		$result = mysqli_query($con,$sql);
		if(!$result)
		{
			 die("Some problem in Deleting. Please try again later.");
			//exit;
		}
	header('Location: client.php' ) ;
?>