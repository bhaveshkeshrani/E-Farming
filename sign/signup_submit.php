<?php

if(isset($_POST['email']))
{
		$pname=$_POST['name'];
		$contact=$_POST['contact'];
		$email=$_POST['email'];
		$pass=$_POST['password'];
		$paddress=$_POST['add'];
		//echo"<pre>";
		//print_r($_POST);
		
		//echo "$email $pass";	
		include 'connect.php';
		$sql = "INSERT INTO person (email,password,pname,paddress,contact) VALUES ('$email','$pass','$pname','$paddress','$contact')";
		$result = mysql_query($sql);
		if(!$result)
		{
			//die("Some problem in checking. Please try again later.");
			header("Location:signup.php");
			
		}
		else
		{
			header("Location: login.php");
			exit;
		}
}
else
{
	header("Location:login.php");
}
?>
