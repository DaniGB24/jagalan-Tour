<?php
// require_once 'mailerClass/class.php';
 require_once 'mailerClass/PHPMailerAutoload.php';
 
 $mail = new PHPMailer;
 
 //Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'mail.jaalantour.com';
	
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "admin@jagalantour.com";

//Password to use for SMTP authentication
$mail->Password = "qwerasdzx1234";

//Set who the message is to be sent from
$mail->setFrom('donotreply@jagalantour.com', 'Admin');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('pokdarwisjagalan@gmail.com');

//Set the subject line
$mail->Subject = 'Order Jagalan Tour';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail->Body = "Nama : <b>\"".$_POST['nama']." <br> No Telp : ".$_POST['nomor']."<br> Jumlah Orang : ".$_POST['jumlah-orang']." <br> Tanggal: ".$_POST['tanggal']." <br> Jam : ".$_POST['waktu']."\"</b>";

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->isHTML(true);  
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else{
	header("Location: ../index.html");
}
// header("Location: index.php");

 
?>