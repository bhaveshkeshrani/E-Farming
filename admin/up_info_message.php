<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}

		$mid = $_GET['mid'];
		$header = $_GET['header'];
		$msg = $_GET['msg'];
		
		if (!preg_replace("[^A-Za-z0-9]", "", $msg))
		{
				echo "msg";
				exit;
		} 		
			
		if (!preg_replace("^([a-z, ,A-Z,0-9]+)?$", $header))
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
		$sql = "UPDATE message SET header = '$header',msg = '$msg' ,time=Now() WHERE mid = '$mid'";
		$result = mysqli_query($con,$sql) or die("please");
		echo "success";
		exit;
		if(!$result)
		{
			echo "please";
			exit;
		}
		

?>