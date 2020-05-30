<?php
session_start();
session_unset();
session_destroy();
	//$_SESSION['error'] = "Invalid login credentials.";
header("Location: ../login.php");
//echo $_COOKIE['c_email'];
exit;

?>
