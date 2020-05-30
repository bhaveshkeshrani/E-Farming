<?php
	$user;
	$lon="00.00";
	$lat="00.00";
	$fadd="Enter farm address";
	$valves="0";
	if(isset($_SESSION['user_id']))
	{
		$user=$_SESSION['user_id'];
		include 'connect.php';
		$sql = "SELECT * FROM person where pid=$user";
		$result = mysql_query($sql);
		if(!$result)
		{
			//die("Some problem in checking. Please try again later.");
	
		//echo "Invalid quesry";
			
		}
		else
		{
		$count_rows = mysql_num_rows($result);
		if($count_rows > 0)
		{
			$row = mysql_fetch_assoc($result);
			$email = $row['email'];
			$address = $row['paddress'];
			$name = $row['pname'];
			$phone=$row['contact'];
			//$_SESSION['logged_in'] = $email;
			//$_SESSION['logged_in'] = $password;
		
			
		}
		}	
		
		//farm
		include 'connect.php';
		
		$sql = "SELECT * FROM farm where fid=(select fid from person where pid=$user)";
		$result = mysql_query($sql);
		if(!$result)
		{
			//die("Some problem in checking. Please try again later.");

			// echo "Invalid quesry";
			
		}
		else
		{
		$count_rows = mysql_num_rows($result);
		if($count_rows > 0)
		{
			$row = mysql_fetch_assoc($result);
			$lon = $row['longi'];
			$lat = $row['lati'];
			$fadd = $row['address'];
			//$_SESSION['logged_in'] = $email;
			//$_SESSION['logged_in'] = $password;
		
			
		}	
			//echo "invalid quesry";
		}	
		
		
	}
?>