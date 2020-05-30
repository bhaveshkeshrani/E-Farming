<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
if(isset($_POST['email']))
{
		$name=$_POST['first_name'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$pass=$_POST['password'];
		$repass=$_POST['repass'];
		if($pass!=$repass)
		{
			echo"password";
			exit;
		}
		//echo "$email $pass";	
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
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "email";
		exit;
		}
		if(empty($name))
		{
				echo "user_name";
				exit;
		}
		if(empty($address))
		{
				echo "address";
				exit;
		}
		if(empty($pass))
		{
				echo "nonpass";
				exit;
		}
				
		include 'connect.php';
		$sql = "INSERT INTO admin (name, email, password,address) VALUES ('$name', '$email', '$pass','$address')";
		$result = mysqli_query($con,$sql);
		if(!$result)
		{
			echo "error";
			exit;
			//die("Some problem in checking. Please try again later.");
			
		}
		else
		{
			echo"success";
			//header("Location: users.php");
			exit;
		}
}
/*else
{

			//header("Location: users.php");
			//exit;
}*/
?>
