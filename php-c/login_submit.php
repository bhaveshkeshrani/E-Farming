<?php
session_start();
if(isset($_POST['email']))
{
		$email=$_POST['email'];
		$pass=$_POST['password'];
		//echo "$email $pass";
		include 'connect.php';
		$sql = "SELECT * FROM person WHERE email='$email' AND password='$pass' LIMIT 1";
		$result = mysql_query($sql);
		if(!$result)
		{
			//die("Some problem in checking. Please try again later.");
			header("Location: login.php");
			exit;
		}
		$count_rows = mysql_num_rows($result);
		if($count_rows > 0){
			$row = mysql_fetch_assoc($result);
			$email = $row['email'];
			$password = $row['password'];
			$name = $row['name'];
			
			$_SESSION['logged_in'] = $email;
			//$_SESSION['logged_in'] = $password;
			$_SESSION['logged_in'] = $name;
			header("Location: index.php");
			exit;
		}
		else
		{
			// echo "Invalid User";
			$_SESSION['error'] = "Invalid login credentials.";
			header("Location: login.php");
			exit;
		}
}
else
{
	//$_SESSION['error'] = "Invalid login credentials.";
			header("Location: login.php");
			exit;
}
?>
