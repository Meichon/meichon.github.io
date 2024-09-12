<?php
require_once '../config.php'; 

class ContactoModelo {
    private $conexion;

    public function __construct() {
        // Datos de conexión a la base de datos (reemplaza con tus datos)
        $servidor = 'localhost';
        $usuario = 'zbitscl';
        $contrasena = 'M31ch0n3#';
        $base_de_datos = 'zbitscl';

        // Conexión a la base de datos
        $this->conexion = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function enviarCorreo($datos) {
        $nombre = $datos['nombre'];
        $asunto = $datos['asunto'];
        $mensaje = $datos['mensaje'];

        $para = $datos['correo']; // Enviar la respuesta al correo del usuario
        $de = CORREO_REMITENTE;
        $cabeceras = "From: " . $de . "\r\n";
        $cabeceras .= "Reply-To: " . $de . "\r\n";
        $cabeceras .= "MIME-Version: 1.0\r\n";
        $cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";

        $cuerpo_mensaje = "
            <html>
            <body>
                <h1>Bienvenido, $nombre.</h1>
                <p>Gracias por comunicarte con ZBITS, nuestro equipo está procesando tu consulta y será atendida a la brevedad.</p>
            </body>
            </html>
        ";

        // Intenta enviar el correo
        if (mail($para, $asunto, $cuerpo_mensaje, $cabeceras)) {
            return true; // Éxito
        } else {
            return false; // Error en el envío
        }
    }

    public function guardarDatos($datos) {
        // Escapar los datos para prevenir inyecciones SQL
        $nombre = $this->conexion->real_escape_string($datos['nombre']);
        $apellido = $this->conexion->real_escape_string($datos['apellido']);
        $organizacion = $this->conexion->real_escape_string($datos['organizacion']);
        $id_empresa = $this->conexion->real_escape_string($datos['id_empresa']);
        $correo = $this->conexion->real_escape_string($datos['correo']);
        $telefono = $this->conexion->real_escape_string($datos['telefono']);
        $asunto = $this->conexion->real_escape_string($datos['asunto']);
        $mensaje = $this->conexion->real_escape_string($datos['mensaje']);

        // Consulta SQL para insertar los datos
        $sql = "INSERT INTO contactos (nombre, apellido, organizacion, id_empresa, correo, telefono, asunto, mensaje) 
                VALUES ('$nombre', '$apellido', '$organizacion', '$id_empresa', '$correo', '$telefono', '$asunto', '$mensaje')";

        // Ejecutar la consulta
        if ($this->conexion->query($sql) === TRUE) {
            return true; // Éxito
        } else {
            return false; // Error en la inserción
        }
    }

    public function __destruct() {
        // Cerrar la conexión a la base de datos
        $this->conexion->close();
    }
}