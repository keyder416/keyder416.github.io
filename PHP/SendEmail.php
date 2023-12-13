<?php

$nombre = $_POST["NameTransmitter"];
$apellido = $_POST["LastName"];
$mensaje = "Contacto de: " . $nombre . " " . $apellido . ". \n" . $_POST["Menssage"];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '\PHPMailer\vendor\autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                   //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'websitedoctoredinson@gmail.com';                     //SMTP username
    $mail->Password   = 'keobpmslydowdsoc';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    //Recipients 
    $mail->setFrom('websitedoctoredinson@gmail.com', 'Doctor Edinson Website');
    $mail->addAddress("keydershamir@gmail.com", "Keyder Garcia");     //Add a recipient

    //Content
    $mail->isHTML(false);                                  //Set email format to HTML
    $mail->Subject = 'Nuevo contacto desde Doctor Edinson Website';
    $mail->Body = $mensaje;
    $mail->AltBody = "";

    $mail->send();
    header("location:/Odontology Web Site/Index.html");
    // echo ("<script>alert('Correo enviado correctamente')</script>");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo ("<script>alert('Correo no enviado correctamente, intentelo de nuevo')</script>");
}