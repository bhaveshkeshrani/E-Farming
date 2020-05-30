<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
		$id=$_GET['id'];
		$name=$_GET['fname'];
		$email=$_GET['email'];
		$address=$_GET['address'];
		// echo" $id $name $email $address";
		// echo "$email $pass";
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "email";
		exit;
		}
		if (!preg_replace("[^A-Za-z0-9]", "", $address))
		{
				echo "address";
				exit;
		}
		if (!preg_replace("[^A-Za-z]", "", $name))
		{
				echo "user_name";
				exit;
		} 
		if (empty(($address)&&($name)))
		{
			echo "nonadd";
			exit;
		}
		include 'connect.php';
		$sql = "UPDATE admin SET name = '$name' , email = '$email',address= '$address' WHERE id = '$id'";
		$result = mysqli_query($con,$sql) or die("please");
		// print_r($result);die;
		echo"success";
		exit;
		
		
		
		
		if(!$result)
		{
			 //die("Some problem in Updating. Please try again later.");
			echo "please";
			die;
		}
?>