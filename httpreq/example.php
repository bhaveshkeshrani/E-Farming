<?php
require 'class-http-request.php';
$r = new HttpRequest("get", "192.168.4.1?pin=05");

if ($r->getError()) 
{
    echo "sorry, an error occured";
} 
if($r->getResponse())
{
	echo "asdasd";
    // parse json and show tweets
    $tweets = json_decode($r->getResponse());
    var_dump($tweets);
}
?>