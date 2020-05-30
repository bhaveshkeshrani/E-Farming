
<?php
function send_mail($to,$subject='',$body='',$full_name='',$attach=''){
	require_once 'PHPMailer/class.mail.php';
			
	$mail = new PHPMailer();  // create a new object  
	$mail->IsSMTP(); // enable SMTP  
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only  
	$mail->SMTPAuth = true;  // authentication enabled  
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail  
	$mail->Host = 'smtp.gmail.com'; 
	$mail->IsHTML(true);
	$mail->Port = 465;   
	$mail->Username = '##########';
	$mail->Password = '##########';		
	//$mail->SetFrom('info@thevende.com','The Vende');
	$mail->Subject = $subject;
	if(strlen($body)>0){ $mail->Body = $body; } 
	$mail->AddAddress($to,$full_name);
	if(strlen($attach) > 0){
		$mail->AddAttachment($attach,'');
	}
	if(!$mail->Send()) {  
		$error = 'Mail error: '.$mail->ErrorInfo;   
		 
	} 
	else 
	{  
		$error = 0;    
	}
	return $error;

	}
?>