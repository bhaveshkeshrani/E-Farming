<?php
	session_start();
	//echo "<pre>";
	//print_r($_POST);	
	include 'connect.php';
	
	
	
	
	
	
	
	$sql = "INSERT INTO `farm`(address, valves, lati, longi) VALUES ('','','','')";
				$result = mysql_query($sql);
				if(!$result)
				{
					//die("Some problem in checking. Please try again later.");
					$_SESSION['error'] = "farm profile: Error while Inserting...";
					header("Location: ../general.php");
					exit;
				}
				else
				{
					$_SESSION['error'] = "farm profile: Successfully inserted..";
					$sql = "SELECT * FROM farm ORDER BY fid DESC LIMIT 1";
					$result = mysql_query($sql);
					$row = mysql_fetch_assoc($result);
					$fid=$row['fid'];
					$sql = "INSERT INTO `person`(email, password, pname, paddress, contact,fid) VALUES (\"$_POST[email]\",\"$_POST[password]\",\"$_POST[name]\",\"$_POST[add]\",\"$_POST[contact]\",\"$fid\")";
					$result = mysql_query($sql);
					
								if(!$result)
								{
									//die("Some problem in checking. Please try again later.");
									$sql = "delete FROM farm where fid=$fid";
									$result = mysql_query($sql);
									$_SESSION['error'] = "Please reenter the data..or the sytem is busy";
									header("Location: ../signup.php");
									exit;
								}
								else
								{
									$_SESSION['error'] = "Successfully regestered...";
									
									header("Location: ../login.php");
									exit;
								}
											
					
					
					
					
					//echo "unsuccess User";
					header("Location: ../general.php");
					exit;
				}
	
	
	
	
	
	
?>