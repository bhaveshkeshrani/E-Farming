<?php
session_start();
if(isset($_SESSION['log_in'])){
	unset($_SESSION['log_in']);
}
header('Location: sign-in.php');
exit;
?>
