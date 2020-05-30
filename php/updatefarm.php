<?php
	session_start();
	$user=$_SESSION['user_id'];
	echo "<pre>";
	print_r($_POST);	
	include 'connect.php';
	$sql = "SELECT * FROM farm WHERE fid=(select fid from person where pid=$user)";
	$result = mysql_query($sql);
	if(!$result)
	{
		$_SESSION['error'] = "farm profile: Error while updating...";
			 //echo "success User";
			header("Location: ../general.php");
			exit;
	}
	$count_rows = mysql_num_rows($result);
	if($count_rows == 1)
	{
				$sql = "UPDATE `farm` SET `address`=\"$_POST[add]\",`lati`=\"$_POST[lat]\",`longi`=\"$_POST[lon]\" WHERE fid=(select fid from person where pid=$user)";
				echo $sql;	
				$result = mysql_query($sql);
				if(!$result)
				{
					//die("Some problem in checking. Please try again later.");
					$_SESSION['error'] = "farm profile: Error while updating...";
					// echo "success User";
					header("Location: ../general.php");
					exit;
				}
				else
				{
					$_SESSION['error'] = "farm profile: Successfully updated..";
					//echo "unsuccess User";
					header("Location: ../general.php");
					exit;
				}
		}
		else
		{
			$_SESSION['error'] = "farm profile: Error while updating...";
					 //echo "success User";
					header("Location: ../general.php");
					exit;
		}
	
?>