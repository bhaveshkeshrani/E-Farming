<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
		$fid=$_GET['fid'];
		include 'connect.php';
		$sql = "DELETE FROM farm WHERE fid=$fid";
		$result = mysqli_query($con,$sql);
		if(!$result)
		{
			 die("Some problem in Deleting. Please try again later.");
			//exit;
		}
	header('Location: farm.php' ) ;
?>