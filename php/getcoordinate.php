<?php
	$user;
	$lat=0;
	$lon=0;
	if(isset($_SESSION['user_id']))
	{
		$user=$_SESSION['user_id'];
		include 'connect.php';
		$sql = "SELECT longi,lati FROM farm where fid=(select fid from person where pid=$user)";
		$result = mysql_query($sql);
		if(!$result)
		{
			//die("Some problem in checking. Please try again later.");
		
			 echo "location not found";
			
		}
		else
		{
		$count_rows = mysql_num_rows($result);
		if($count_rows > 0)
		{	
			$row = mysql_fetch_assoc($result);
			$lon = $row['longi'];
			$lat = $row['lati'];
			//echo $lon;
			//echo $lat;
			//$_SESSION['logged_in'] = $email;
			//$_SESSION['logged_in'] = $password;
		
			
		}
		}	
	}
?>