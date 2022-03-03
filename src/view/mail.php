
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['name']) && isset($_POST['email'])){
$name = $_POST['name'];
$email = $_POST['email'];
$body = $_POST['body'];

require "Contact/Exception.php";
require "Contact/PHPMailer.php";
require "Contact/SMTP.php";

$mail = new PHPMailer();

//smtp reglage
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "poire.afpa@gmail.com";
$mail->Password = "Poire!Afpa2022";
$mail->Port= 587;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;


//email reglage
$mail->isHTML(true);
$mail->setFrom($email, $name);
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