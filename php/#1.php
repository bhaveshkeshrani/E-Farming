<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "192.168.0.2?pin=081");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$op=curl_exec($ch);
echo $op;
curl_close($ch);
?>