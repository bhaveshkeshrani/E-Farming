<?php
// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://192.168.0.2:80?pin=050");
//curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER ,true);
	
curl
// grab URL and pass it to the browser
 echo curl_exec($ch);
//echo getResponse();
// close cURL resource, and free up system resources
curl_close($ch);
?>