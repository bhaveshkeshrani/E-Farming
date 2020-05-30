<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}

		$tid = $_GET['tid'];
		$header = $_GET['header'];
		$desc = $_GET['desc'];
		
		if (!preg_replace("^([0-9,(,),{,}, ,.,-,a-z,A-Z]+)?$", $desc))
		{
				echo "desc";
				exit;
		} 		
			
		if (!preg_replace("^([a-z, ,-,A-Z,0-9]+)?$", $header))
		{
				echo "header";
				exit;
		}
		if(empty($desc))
		{
				echo"nondesc";
				exit;
		}
		if(empty($header))
		{
				echo"nonheader";
				exit;
		}	
		
		include 'connect.php';
		$sql = "UPDATE `terms` SET `header`='$header',`desc`='$desc' WHERE `tid`='$tid'";
		$result = mysqli_query($con,$sql) or die("please");
		echo "success";
		exit;
		
?>