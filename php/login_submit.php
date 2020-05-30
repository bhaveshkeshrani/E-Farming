<?php
	session_start();
if(isset($_POST['email']) && isset($_POST['password']))
{
		$email=$_POST['email'];
		$pass=$_POST['password'];
		//set_include_path(".:/root");
		//include "connect.php";
		echo "$email $pass";
		include 'connect.php';
		$sql = "SELECT * FROM person WHERE email='$email' AND password='$pass' LIMIT 1";
		$result = mysql_query($sql);
		if(!$result)
		{
			//die("Some problem in checking. Please try again later.");
			$_SESSION['error'] = "Invalid login credentials.";
			 //echo "Invalid User";
			header("Location: ../login.php");
			exit;
		}
		else
		{
				$count_rows = mysql_num_rows($result);
				if($count_rows > 0)
				{
					$row = mysql_fetch_assoc($result);
					$email = $row['email'];
					$pass = $row['password'];
					$name = $row['pname'];
					$uid=$row['pid'];
					$fid=$row['fid'];
					//$_SESSION['logged_in'] = $email;
					//$_SESSION['logged_in'] = $password;
					$_SESSION['logged_in'] = $name;
					$_SESSION['user_id']=$uid;
					$_SESSION['fid']=$fid;
					$_SESSION['updateflg']=0;
					if(isset($_POST['remember']))
					{
						echo "remember $email $pass";
						setcookie("c_email",$email,0,"/");
						setcookie("c_pass",$pass,0,"/");
					}	
					else
					{
				
						echo "not remember";
						setcookie("c_email",$email,time()-100,"/");
						setcookie("c_pass",$pass,time()-100,"/");
						//unset($_COOKIE['c_email']);
						//unset($_COOKIE['c_pass']);
					}
					
					header("Location: ../index.php");
					exit;	
				}
				else
				{
					 echo "Invalid User";
					$_SESSION['error'] = "Invalid login credentials.";
					header("Location: ../login.php");
					exit;
				}	
		
		}
}
?>
