<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$email = $_POST['mail'];
$telefono = $_POST['telefono'];
$provincia = $_POST['provincia'];
$local_propio = $_POST['local_propio'];
$detalles_de_zona = $_POST['detalles_de_zona'];
$socios = $_POST['socios'];
$trabajo_en_equipo = $_POST['trabajo_en_equipo'];
$conocimientos_gastronomico = $_POST['conocimientos_gastronomico'];
$interes = $_POST['interes'];
echo $mail;

$emailBody = <<<EOD
 Ha recibido un mail de $nombre $apellido <br>
 edad: $edad <br>
 Mail: $email <br>
 Telefono: $telefono <br>
 Provincia: $provincia <br>
 ¿Tiene local propio?: $local_propio <br>
 Detalles de la zona: $detalles_de_zona <br>
 ¿Tiene Socios?: $socios <br>
 ¿Tiene experiencia en trabajo en equipo?: $trabajo_en_equipo <br>
 ¿Posee conocimientos gastronómicos?: $conocimientos_gastronomico <br>
 ¿Por qué te interesa trabajar con nosotros?: $interes
EOD;

var_dump($_POST);
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.susorotiseria.com.ar';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'administracion@susorotiseria.com.ar';                 // SMTP username
    $mail->Password = 'suso2018*';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('administracion@susorotiseria.com.ar', 'Mailer');
    $mail->addAddress('administracion@susorotiseria.com.ar', 'Mailer');     // Add a recipient
    $mail->addReplyTo( $email, 'Information');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Has recibido un correo desde el formularo de franquicias';
    $mail->Body    = $emailBody;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
