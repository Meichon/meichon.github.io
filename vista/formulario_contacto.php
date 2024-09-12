<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Contacto</title>
</head>
<body>
    <h1>Contáctanos</h1>
    <form action="../index.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="organizacion">Organización:</label>
        <input type="text" id="organizacion" name="organizacion"><br><br>

        <label for="id_empresa">ID Empresa:</label>
        <input type="text" id="id_empresa" name="id_empresa"><br><br>

        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono"><br><br>

        <label for="asunto">Asunto:</label>
        <input type="text" id="asunto" name="asunto" required><br><br>

        <label for="mensaje">Mensaje:</label><br>
        <textarea id="mensaje" name="mensaje" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>