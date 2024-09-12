CREATE TABLE contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    organizacion VARCHAR(255),
    id_empresa VARCHAR(255),
    correo VARCHAR(255) NOT NULL,
    telefono VARCHAR(20),
    asunto VARCHAR(255) NOT NULL,
    mensaje TEXT NOT NULL
);