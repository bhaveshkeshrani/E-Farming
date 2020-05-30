<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
		$oldpassword=$_POST['oldpassword'];
		$newpassword=$_POST['newpassword'];
		$repassword=$_POST['repassword'];
		$email=$_SESSION['log_in'];
		//echo"$oldpassword $newpassword $repassword";
		//exit;
		if (empty(($oldpassword)&&($newpassword)&&($repassword)))
		{
			echo"field";
			exit;
		}
		if($newpassword!=$repassword)
		{
			echo"password";
			exit;
		}
		include 'connect.php';
		$sql1 = "SELECT password FROM `admin` WHERE email='$email'";
		$result = mysqli_query($con,$sql1) or die("please");
		
		if($oldpassword != mysqli_result($result, 0))
        {
           echo "oldpass";
		   exit;
        }
			
		$sql = "UPDATE admin SET password = '$newpassword' where email = '$email'";
		$result = mysqli_query($con,$sql) or die("please");
		echo"success";
		exit;
		
		
?>