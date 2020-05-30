<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}

		$pid = $_GET['pid'];
		$email = $_GET['email'];
		$pname = $_GET['pname'];
		$password = $_GET['password'];
		$paddress= $_GET['paddress'];
		$contact = $_GET['contact'];
		$fid = $_GET['fid'];
				
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "email";
		exit;
		}
		if (!preg_replace("[^A-Za-z0-9]", "", $paddress))
		{
				echo "address";
				exit;
		} 		
		if (!preg_replace("[^0-9]", "", $contact)|| strlen($contact)!=10)
		{
				echo "contact";
				exit;
		} 
		// if(!strlen((string) $contact)==10)
		// {
			// echo"contact";
			// exit;
		// }			
		if (!preg_replace("[^A-Za-z]", "", $pname))
		{
				echo "client_name";
				exit;
		} 		
		if (empty(($paddress)&&($pname)))
		{
			echo"nonadd";
			exit;
		}	
		if (empty($contact))
		{
			echo"contact1";
			exit;
		}
		if (empty($password))
		{
			echo"password";
			exit;
		}				
		include 'connect.php';
		$sql = "UPDATE person SET email = '$email',pname = '$pname' ,password='$password', paddress= '$paddress',contact='$contact' WHERE pid = '$pid'";
		$result = mysqli_query($con,$sql) or die("please");
		echo "success";
		exit;
		if(!$result)
		{
			echo "please";
			exit;
		}
		

?>