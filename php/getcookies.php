<?php

if(isset($_COOKIE['c_email']) && isset($_COOKIE['c_pass']))
{
	$cname=$_COOKIE['c_email'];
	$cpass=$_COOKIE['c_pass'];	
}
else
{
	$cname='';
	$cpass='';
}
?>