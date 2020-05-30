<?php
		session_start();
		$desc=$_GET['desc'];
		$fid=$_SESSION['fid'];
		//echo "<pre>$fid";
		//print_r ($_POST);
		include 'connect.php';
		$sql = "INSERT INTO `valve`(`desc`, `status`, `fid`) VALUES (\"$desc\",0,$fid)";
		$result = mysql_query($sql);
		if(!$result)
		{
			header("Location: ../index.php");
			exit;
		}
		else
		{
			header("Location: ../index.php");
			exit;
		}
?>