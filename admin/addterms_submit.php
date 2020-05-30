<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
if(isset($_POST['header']))
{
		
		$header = $_POST['header'];
		$desc = $_POST['desc'];
		
		if (!preg_replace("[^A-Za-z0-9]", "", $desc))
		{
				echo "desc";
				exit;
		} 		
			
		if (!preg_replace("^([a-z, ,A-Z,0-9]+)?$", $header))
		{
				echo "header";
				exit;
		}
		if(empty(($header)&&($desc)))
		{
				echo"nonempty";
				exit;
		}
		
		include 'connect.php';
		$sql = "INSERT INTO `terms`(`header`, `desc`) VALUES ('$header','$desc')";
		$result = mysqli_query($con,$sql) or die("please");
		echo "success";
		exit;
		
		if(!$result)
		{
			echo "please";
			exit;
		}
}	

?>