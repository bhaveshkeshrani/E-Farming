<?php
		session_start();
		$vid=$_GET['vid'];
		echo $vid;
		include 'connect.php';
		$sql = "delete from valve where vid=$vid";
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