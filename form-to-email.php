<?php
	
	
	header('Location: http://www.ball-events.com/contact.html');
	
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	
	$tdate = strtotime($_POST["edate"]);
	$evdate = date('m-d-Y', $tdate);
	
	$occasion = $_POST['occasion'];
	$message = $_POST['message'];
	
	$timestamp = new DateTime();
	$timestamp = $timestamp->getTimestamp();
		
	$email_from = 'ball-events.com';
	$email_subject = "New Form Submission from ball-events.com";
	$email_body = "User: $name. \n\n"."Event Date: $evdate. \n\n"."Occasion: $occasion. \n\n"."Message: $message. \n\n";
		
	$headers = "From: $email_from \r\n";
	$headers .= "Reply-To: $visitor_email \r\n";
	$to = "lindsey@ball-events.com, atzakis@gmail.com";
	
	

	mail($to,$email_subject,$email_body,$headers);
		
	function IsInjected($str)
	{
		$injections = array('(\n+)',
		'(\r+)',
		'(\t+)',
		'(%0A+)',
		'(%0D+)',
		'(%08+)',
		'(%09+)'
		);
                
		$inject = join('|', $injections);
		$inject = "/$inject/i";
     
		if(preg_match($inject,$str))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
 
	if(IsInjected($visitor_email))
	{
		echo "Bad email value!";
		exit;
	}

?>