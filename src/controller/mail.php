
<?php
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['name']) && isset($_POST['email'])){
$name = $_POST['name'];
$email = $_POST['email'];
$body = $_POST['body'];
$subject = $_POST['subject'];



$mail = new PHPMailer();

//smtp reglage
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->Mailer = "smtp";
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "poire.afpa@gmail.com";
$mail->Password = "Poire!Afpa2022";
$mail->Port = 587;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 


//email reglage
$mail->isHTML(true);
$mail->setFrom("poire.afpa@gmail.com", $name);
$mail->addAddress("poire.afpa@gmail.com");
$mail->Subject = ("$email ($subject)");
$mail->Body = $body;

if($mail->send()){
    $status = "success";
    $response = "Le Message a été envoyé";
}
else
{
    $status = "failed";
    $response = "erreur d'envoi: <br>" . $mail->ErrorInfo;

}

exit(json_encode(array("status" => $status, "response" => $response)));
}

?>