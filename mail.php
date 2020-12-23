<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$mail = new PHPMailer(true);
$destino = "pwpfinal2020@gmail.com";
$asunto = "Comentario G.I.N.A.";
$mensaje = "Nombre: $_POST[nombre]<br> Apellido: $_POST[last] <br>Email: $_POST[email] <br>Telefono: $_POST[telefono]<br> Comentarios: $_POST[area]"; 
$m1 = "Hola $_POST[nombre] tu solicitud esta siendo procesada, te responderemos lo mas breve posible";
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$secret= $_POST['secret'];
try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $_POST['email'];                     // SMTP username
    $mail->Password   = $_POST['secret'];                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($_POST['email'], $_POST['nombre']);
    $mail->addAddress($destino, 'PWEquipo');     // Add a recipient
    // Attachments  
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje;
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
/////////////////////////////////////////////////segundo correo
try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'pwpfinal2020@gmail.com';                     // SMTP username
    $mail->Password   = 'gina2020cdf';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('pwpfinal2020@gmail.com', 'PWEquipo');
    $mail->addAddress("$_POST[email]", "$_POST[nombre]");     // Add a recipient
    // Attachments  
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $m1;
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header("Location: index.php");
die();
?>








