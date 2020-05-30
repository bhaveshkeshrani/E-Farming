<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
if(isset($_POST['email']))
{
	$email=$_POST['email'];
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo "email";
		exit;
	}
	if($email != $_SESSION['log_in'])
	{
	   echo "invalid";
	   exit;
	}
		require "PHPMailer/send_mail.php";
		$sub="Reset Your Password";
		
		$_SESSION['otp']=rand(999,99999);
		$body="Your OTP is : <b>{$_SESSION['otp']}</b>";
		$ret=send_mail($email,$sub,$body);
	if($ret == 0)
		echo 0;
	else
		echo $ret;
}
else if(isset($_POST['input_otp']))
{
	if(isset($_SESSION['otp']))
	{
		$otp=$_SESSION['otp'];
		$input=$_POST['input_otp'];
		if($otp == $input)
		{
			unset($_SESSION['otp']);
			echo 0;
		}
		else
		{
			echo "Invalid OTP!";
			exit;
		}
	}
	else
	{
		echo "OTP is not Generated yet!";
		exit;
	}
}
	else if(isset($_POST['pwd']))
	{
	$email=$_POST['email1'];
	$pwd=$_POST['pwd'];
	
	include 'connect.php';
	$sql1 = "UPDATE `admin` SET `password`='$pwd' WHERE `email`='$email'";
	$result = mysqli_query($con,$sql1) or die("please");
	echo 0;
	}
?>