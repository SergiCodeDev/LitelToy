<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

define("RECAPTCHA_V3_SECRET_KEY", 'tu_clave_privada_de_recaptcha');


if(!isset($_POST["nombrecompleto"]) || empty($_POST["nombrecompleto"])) {
    exit;
}
if(!isset($_POST["correof"]) || empty($_POST["correof"])) {
    exit;
}
if(!isset($_POST["asunto"]) || empty($_POST["asunto"])) {
    exit;
}
if(!isset($_POST["mansaje"]) || empty($_POST["mansaje"])) {
    exit;
}

// filtrar datos

$nombrecompleto = htmlspecialchars(trim(filter_var($_POST['nombrecompleto'], FILTER_SANITIZE_STRING)));
$correof = htmlspecialchars(trim(filter_var($_POST['correof'], FILTER_SANITIZE_EMAIL)));
$asunto = htmlspecialchars(trim(filter_var($_POST['asunto'], FILTER_SANITIZE_STRING)));
$mansaje = htmlspecialchars(trim(filter_var($_POST['mansaje'], FILTER_SANITIZE_STRING)));



$token = $_POST['token'];
$action = $_POST['action'];
//llamar api rcapchat google
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);
if ($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {

    

    require 'pluguins/PHPMailer/src/Exception.php';
    require 'pluguins/PHPMailer/src/PHPMailer.php';
    require 'pluguins/PHPMailer/src/SMTP.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'webmail.nombrepaginaweb.tk';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'alumn11@nombrepaginaweb.tk';                     //SMTP username
        $mail->Password   = 'Alumn11#2023';                               //SMTP password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            )
        );

        //Recipients
        $mail->setFrom('alumn11@nombrepaginaweb.tk', $nombrecompleto);
        $mail->addAddress('alumn11@nombrepaginaweb.tk', 'yo');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo($correof, $nombrecompleto);
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        //$mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto." - Asunto del formulario de contacto ".date("d/m/Y");
        $mail->Body    = $mansaje;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo json_encode('Mensaje enviado');
    } catch (Exception $e) {
        echo json_encode("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }


} else {
    echo json_encode("Error SPAM");
    exit;
}

?>

