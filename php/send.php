<?php
$request = "http://192.168.2.1?c=1";
$response=@file_get_contents($request);
$jsonobj  = json_decode($response);
?>