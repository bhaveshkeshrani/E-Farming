<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
			
		$fid = $_GET['fid'];
		$device_loc = $_GET['device_loc'];
		$longi = $_GET['longi'];
		$lati = $_GET['lati'];
		$valves= $_GET['valves'];
		$address = $_GET['address'];
		
		if(!filter_var($device_loc, FILTER_VALIDATE_IP)) 
		{
				echo "device";
				exit;
		}
		
		if (!preg_replace("[^A-Za-z0-9]", "", $address))
		{
				echo "address";
				exit;
		} 
		if(empty($address))
		{
				echo "address";
				exit;
		} 
		if(empty($longi))
		{
			echo"nonlongi";
			exit;
		}			

		if(empty($lati))
		{
			echo"nonlati";
			exit;
		}		
		
		include 'connect.php';
		$sql = "UPDATE farm SET device_loc = '$device_loc',longi = '$longi' ,lati='$lati',valves=$valves,address='$address' WHERE fid = '$fid'";
		$result = mysqli_query($con,$sql) or die("please");
		echo "success";
		exit;
		if(!$result)
		{
			echo "please";
			exit;
		}
		

?>