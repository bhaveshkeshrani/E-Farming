<?php
	$rain="cloud=0";
	$temp="0";
	$humidity="0";
	$wind="0";
	$neterror="";
	$location="NULL";
	$i=0;
	include 'getcoordinate.php';	
	$request = "http://api.apixu.com/v1/forecast.json?key=a6d3b7fec1ad4f6e866115209161308&lat=".$lat."&lon=".$lon."&q=%22%22";
	//echo "<pre>";
	//echo $request;
	$response=@file_get_contents($request);
	$jsonobj  = json_decode($response);
	//echo "<pre>";
	//print_r ($response); 
	if(isset($jsonobj->current->cloud))
	{
	$rain="cloud=".$jsonobj->current->cloud;
	$temp=$jsonobj->current->temp_c;
	$wind=$jsonobj->current->wind_kph;
	$humidity=$jsonobj->current->humidity;
	$location=$jsonobj->location->name.','.$jsonobj->location->region;
	}
	else
	{
	$_SESSION['error']="Please complete your farm profile to see the weather news or the system is busy..";
	}
	$graph=array();
?>