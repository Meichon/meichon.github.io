<?php
require_once 'controlador/ContactoControlador.php';
require_once 'vista/formulario_contacto.php'; 

$controlador = new ContactoControlador();
$controlador->procesarFormulario();