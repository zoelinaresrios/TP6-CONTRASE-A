<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/src/SMTP.php';
require '../vendor/phpmailer/src/Exception.php';
require 'db.php';

// Leer JSON
$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email'] ?? '';
$usuario = $data['usuario'] ?? '';
$password = $data['password'] ?? '';

if (!$email || !$usuario || !$password) {
    echo json_encode(["mensaje" => "Datos incompletos"]);
    exit;
}

// 🔐 Guardar en BD
$conn = conectar();

$stmt = $conn->prepare("INSERT INTO usuarios (email, usuario, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $usuario, $password);
$stmt->execute();

// 📧 CONFIGURAR MAIL
$mail = new PHPMailer(true);

try {
    // SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'informacion@alpiletas.com.ar';
    $mail->Password = '#Focus1234'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Remitente
    $mail->setFrom('informacion@alpiletas.com.ar', 'EVA Sistemas');

    // Destinatario
    $mail->addAddress($email);

    // Contenido
    $mail->isHTML(true);
    $mail->Subject = 'Credenciales EVA - Sistema de Agua';
    $mail->Body = "
        <h2>Bienvenido a EVA</h2>
        <p>Tu cuenta fue creada correctamente:</p>
        <b>Usuario:</b> $usuario <br>
        <b>Contraseña:</b> $password <br><br>
        <p>Ya podés ingresar al sistema.</p>
    ";

    $mail->send();

    echo json_encode(["mensaje" => "Usuario creado y mail enviado correctamente"]);

} catch (Exception $e) {
    echo json_encode([
        "mensaje" => "Usuario creado pero error al enviar mail",
        "error" => $mail->ErrorInfo
    ]);
}
?>