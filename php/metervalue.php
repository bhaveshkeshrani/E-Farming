<?php
		#session_start();
		$fid=$_SESSION['fid'];
		include 'connect.php';
		
		$sql="select device_loc from farm where fid=$fid";
			$result = mysql_query($sql);
			if(!$result)
			{
				echo "no device found...";
			}
			else
			{
				$count_rows = mysql_num_rows($result);
				if($count_rows > 0)
				{	
					$row = mysql_fetch_assoc($result);
					$ip = $row['device_loc'];
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, "$ip?pin=002");
						curl_setopt($ch, CURLOPT_HEADER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$op=curl_exec($ch);
						//echo $op;
						if($op==NULL)
						$meter=[0,0,0,0];
						else
						$meter=explode(",",$op);
						curl_close($ch);
				}
			}
?>