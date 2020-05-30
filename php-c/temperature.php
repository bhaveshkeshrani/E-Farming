<?php

    //$request = 'http://api.openweathermap.org/data/2.5/forecast/city?id=1259229&APPID=6c2cb4f89462aa734f9b6154eff81dcf&units=metric';
	$request ='http://api.apixu.com/v1/forecast.json?key=a6d3b7fec1ad4f6e866115209161308&q=pune';
    $response  = file_get_contents($request);
    $jsonobj  = json_decode($response);
	
							$tmp=$jsonobj->forecast->forecastday[0]->hour[0]->time_epoch;	
							echo date("g:i a",$tmp);
							for($x=1;$x<=10;$x++)
							{
								$tmp=$jsonobj->forecast->forecastday[0]->hour[$x]->time_epoch;
								echo ",".date("g:i a",$tmp);
							}
							
							
	echo "<pre>";
   print_r ($jsonobj);
  $graph=array();
	//$i=0;
	//for($x = 0; $x < 20; $x++) {
    //$graph[$x]=$jsonobj->list[$x]->dt;
	//echo date('d/m H:i:s', $graph[$x]);
	//echo "<br>";
	//}
	
	 //echo $graph[0]/2; for($x = 1; $x < 10; $x++) { $graph[$x]=$jsonobj->list[$x]->main->humidity; echo ','.$graph[$x]/2; } 
	?>