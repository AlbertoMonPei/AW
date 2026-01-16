CREATE DATABASE IF NOT EXISTS usermanager CHARACTER SET utf8mb4;
USE usermanager;


CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(80) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    edad INT NOT NULL,
    rol ENUM('admin', 'user') DEFAULT 'user'
);


INSERT INTO usuarios (nombre, email, edad, password, rol) 
VALUES ('alberto', 'alberto@correo.es', 32, '$2y$10$h6ykiOrnAWi6Sza5bvlkwOt9AOxJGe08f1Pgg1akMiyLu9xPCCjrG', 'admin');