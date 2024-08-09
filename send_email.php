

<?php

// Función para enviar correo electrónico
function enviarCorreo($nombre, $apellido, $correo, $asunto, $mensaje) {
  // Configurar servidor SMTP
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = "mail.zbits.cl"; // Servidor SMTP
  $mail->Port = 465; // Puerto SMTP
  $mail->SMTPSecure = "tls"; // Seguridad SMTP
  $mail->SMTPAuth = true; // Autenticación SMTP
  $mail->Username = "info@zbits.cl"; // Usuario SMTP
  $mail->Password = "M31ch0n3#"; // Contraseña SMTP

  // Configuración del correo
  $mail->setFrom($correo, $nombre . " " . $apellido);
  $mail->addAddress("cn.lorca@gmail.com"); // Destinatario
  $mail->Subject = $asunto;
  $mail->Body = $mensaje;
  $mail->isHTML(true); // Enviar como HTML

  // Enviar correo
  if (!$mail->send()) {
    echo "Error al enviar correo electrónico: " . $mail->ErrorInfo;
  } else {
    echo "Correo electrónico enviado correctamente.";
  }
}

// Obtener datos del formulario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];

// Enviar correo
enviarCorreo($nombre, $apellido, $correo, $asunto, $mensaje);

?>