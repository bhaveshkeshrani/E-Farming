<?php
		session_start();
		$vid=$_GET['vid'];
		$st=$_GET['st'];
		$stp=$_GET['stp'];
		include 'connect.php';
				$sql = "update valve set autoon='$st',autooff='$stp' where vid=$vid";
				$result = mysql_query($sql);
				if(!$result)
				{
					//echo "Please follow the time pattern...";
					//header("Location: ../index.php");
						//exit;
				}
				else
				{
					//echo "device status updated...";
					//exit;
				}
?>