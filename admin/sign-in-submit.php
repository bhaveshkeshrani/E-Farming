<?php
session_start();
if(isset($_SESSION['log_in'])){
	header("Location:index.php");
	exit;
}

if(isset($_POST['email']))
{
		$email=$_POST['email'];
		$pass=$_POST['password'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "email";
		exit;
		}
		if(empty($pass))
		{
			echo"password";
			exit;
		}
		include 'connect.php';
		// print_r($con);
		$sql = "SELECT * FROM `admin` WHERE email='$email' AND password='$pass' LIMIT 1";
		
		$result = mysqli_query($con,$sql);		
		$count_rows = mysqli_num_rows($result);
		
		if($count_rows > 0){
			$row = mysqli_fetch_assoc($result);
			$email = $row['email'];	
			$name = $row['name'];	
			$_SESSION['log_in'] = $email;
			$_SESSION['user_name'] = $name;			
						
			echo "success";
			exit;
		}
		else
		{
			echo "error";
			exit;
		}
}
else
{
			$_SESSION['error'] = "Invalid login credentials.";
			header("Location: sign-in.php");
			exit;
			
}
?>
