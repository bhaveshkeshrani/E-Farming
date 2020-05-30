
<?php
	/*session_start();
   include 'connect.php';
   session_unset();
	header('LOCATION:login.php');
	exit();*/
	
	session_start();
	unset($_SESSION);
	session_unset(); 
	session_destroy();
	session_write_close();
	header('Location: ../login.php');
	echo "logout";
	//die;
?>
