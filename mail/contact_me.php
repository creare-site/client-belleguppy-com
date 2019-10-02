<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

require_once '../inc/sendmail/PHPMailerAutoload.php';
require_once '../inc/sendmail/email.c.php';
	
// Create the email and send the message
$to = constant('EMAIL_FROM_ADDRESS'); // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form: $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";

//$headers = "From: hello@belleguppy.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
//$headers .= "Reply-To: $email_address";	

$mail = new PHPMailer;

$mail->CharSet = "UTF-8";
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = constant('SMTP_SERVER'); //'smtp.mandrillapp.com:587';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = constant('SMTP_USR');                 // SMTP username
$mail->Password = constant('SMTP_PASS');                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
                            
$mail->From = $email;
$mail->FromName = $email_address;
$mail->addAddress($to); 

$mail->isHTML(false);                                  // Set email format to HTML

$mail->Subject = $email_subject;
$mail->Body    = $email_body;

//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            
$mail->send();

//mail($to,$email_subject,$email_body,$headers);
return true;			
?>
