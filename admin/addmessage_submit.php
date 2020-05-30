<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
if(isset($_POST['header']))
{
		
		$header = $_POST['header'];
		$msg = $_POST['msg'];
		
		if (!preg_replace("[^A-Za-z0-9]", "", $msg))
		{
				echo "msg";
				exit;
		} 		
			
		if (!preg_replace("^([a-z,0-9, ,A-Z]+)?$", $header))
		{
				echo "header";
				exit;
		}
		if(empty(($header)&&($msg)))
		{
				echo"nonempty";
				exit;
		}
		include 'connect.php';
		$sql = "INSERT INTO message(header, msg,time) VALUES ('$header', '$msg',now())";
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