<?php
	session_start();
	$user=$_SESSION['user_id'];
	echo "<pre>";
	print_r($_POST);	
	include 'connect.php';
	$sql = "UPDATE `person` SET `pname`=\"$_POST[name]\",`paddress`=\"$_POST[add]\",`contact`=\"$_POST[contact]\" WHERE pid=$user";
		echo $sql;	
		
		$result = mysql_query($sql);
		if(!$result)
		{
			//die("Some problem in checking. Please try again later.");
			$_SESSION['error'] = "user profile: Error while updating...";
			 //echo "success User";
			header("Location: ../general.php");
			exit;
		}
		else
		{
			$_SESSION['error'] = "user profile: Successfully updated..";
			//echo "unsuccess User";
			header("Location: ../general.php");
			exit;
		}
?>