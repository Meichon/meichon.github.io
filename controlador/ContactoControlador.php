<?php
require_once '../controlador/ContactoModelo.php';

class ContactoControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new ContactoModelo();
    }

    public function procesarFormulario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener datos del formulario
            $datos = [
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'organizacion' => $_POST['organizacion'],
                'id_empresa' => $_POST['id_empresa'],
                'correo' => $_POST['correo'],
                'telefono' => $_POST['telefono'],
                'asunto' => $_POST['asunto'],
                'mensaje' => $_POST['mensaje']
            ];

            // Enviar correo y guardar datos
            if ($this->modelo->enviarCorreo($datos) && $this->modelo->guardarDatos($datos)) {
                echo "Mensaje enviado y datos guardados con éxito.";
            } else {
                echo "Error al procesar la solicitud. Por favor, inténtalo de nuevo más tarde.";
            }
        }
    }
}