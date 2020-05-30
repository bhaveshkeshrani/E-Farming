<html>
    <head>
   <meta http-equiv="refresh" content="<?php echo '10'?>;URL='timetrigger.php'"> 
    </head>
    <body>
    <?php
        echo "Watch the page reload itself in 10 second!";
    ?>
    </body>
</html>
<?php
	
	date_default_timezone_set('Asia/Kolkata');
						$dt=date('H:i:00');
		session_start();
		$fid=$_SESSION['fid'];
		include 'connect.php';
			$sql="select * from valve where autooff='$dt' or autoon='$dt'";
				//$sql = "SELECT vid,autoon,autooff,status FROM valve WHERE fid=$fid";
				$result = mysql_query($sql);
				if(!$result)
				{
						echo("Please try again later...");
					
				}
				else
				{
					$count_rows = mysql_num_rows($result);
					if($count_rows > 0)
					{
						
						echo $dt;
						
						 while($row = mysql_fetch_assoc($result))
						{
													echo "sssssssfsk";
													$vid=$row["vid"];
													$autoon=$row["autoon"];
													$autooff=$row["autooff"];
													$stat=$row["status"];
													
													echo "<br>";
													echo $autoon."#####".$autooff;
													if($autoon!=$autooff)
													{
														if($dt==$autoon && $stat==0)
														{
															echo "ON";
															include_once "switchvalve.php";
															$_SESSION['updateflg']=1;
															
														sleep(5);
														}
														else if($dt==$autooff && $stat==1)
														{
															echo "Off";
															include_once "switchvalve.php";
															$_SESSION['updateflg']=1;
															sleep(5);
														
														}
													}
						}
						echo $_SESSION['updateflg'];
					}
					else
					{	echo "No entry for valve was found..";
					}
				}
							
?>