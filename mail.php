<?php


require_once('class.phpmailer.php');
$mail = new PHPMailer();
$mail->SetLanguage('fr');
$mail->Subject = 'Tutoriel: envoi de mail php';
$mail->IsHTML(true);

// enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPDebug  = 2; 

$mail->Debugoutput = 'error_log';
$body = file_get_contents('message.html');
$mail->Body = $body;
$mail->AltBody="This is text only alternative body.";
$mail->AddAddress('mour.keita@gmail.com','Mour Keita');
$mail->From = 'papemour93@gmail.com';
$mail->FromName = "testeur";
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "papemour93@gmail.com";
$mail->Password = "geer4oK4";
$mail->CharSet = "UTF-8";
$mail->AddAttachment("img/fav.ico");
$mail->AddAttachment("img/1.jpg");


echo $body;
$mail->msgHTML($body);

// contneu au format HTML
//$html = file_get_contents('message.html');
//$mail->MsgHTML( $html );


$mail->Send();

/*
 *  contenu alternatif en cas d'échec de lecture du format HTML
$txt = file_get_contents('message.txt');
$mail->AltBody = $txt;
*  
* */


$mail->SmtpClose();


/* HOW TO SEND MAIL WITH PHP mail()
 * 
 * 
$to = "mour.keita@gmail.com";
$subject = "Test d'envoi de mail avec PHP Mail";
$message = "Voilà le message";
$headers = 'From: mour.keita@gmail.com' . "\r\n" .
     'Reply-To: mour.keita@gmail.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

* 
* 
*/


?>
