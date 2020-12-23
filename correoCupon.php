<?php
session_start();
include ("php_mysql/conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$mail = new PHPMailer(true);
$contra = $desc;
$destino = "pwpfinal2020@gmail.com";
$asunto = "Comentario G.I.N.A.";
$cuenta = $_SESSION['nombreCorreo'];
$m1 = "Hola " . $cuenta . " tu codigo de descuento es " . $contra;
$query = "SELECT Correo FROM usuario WHERE Cuenta = '" . $cuenta . "'";
$resultado = $conexion->query($query)->fetch_assoc();

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
    $mail->addAddress($correo, $cuenta);     // Add a recipient
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
header("Location: ../index.php");
die();
?>