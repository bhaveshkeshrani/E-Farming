<?php
				
		session_start();
		if(isset($_GET['vid'])&& isset($_GET['stat']))
		{
		$vid=$_GET['vid'];
		$stat=$_GET['stat'];
		}
		$fid=$_SESSION['fid'];
		if($stat==0)
			$stat=1;
		else
			$stat=0;
		include 'connect.php';
		
			$sql="select f.device_loc,v.desc from farm f,valve v where f.fid=v.fid and f.fid=$fid and v.vid=$vid";
			$result = mysql_query($sql);
			if(!$result)
			{
				echo "Error in connecting device...";
			}
			else
			{
				$count_rows = mysql_num_rows($result);
				if($count_rows > 0)
				{	
					$row = mysql_fetch_assoc($result);
					$ip = $row['device_loc'];
					$desc = $row['desc'];
					//$req="Location: http://$did"."?c="."$vid";
					//header($req);
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, "$ip?pin=$desc$stat");
						curl_setopt($ch, CURLOPT_HEADER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$op=curl_exec($ch);
						//echo $op;
						curl_close($ch);
					if ($op=="success")
					{
						$sql = "update valve set status=$stat,last_chng=now() where vid=$vid LIMIT 1";
						$result = mysql_query($sql);
						if(!$result)
						{
							echo "valve status updation error...";
							//header("Location: ../index.php");
							//exit;
						}
						else
						{
							echo "<font color='green'>switched successfully..</font>";
							//exit;
						}
					}
					else
						echo "<font color='red'>Failed in switching..</font>";
				}
				else
				{
				echo "No device found ...";	
				}
			}
	
			
?>