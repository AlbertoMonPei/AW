
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
VALUES ('alberto', 'alberto@correo.es', 32, '$2y$10$Xw6PXq.Y.s.m.k/..t.u..g/..h.j.k.l.m.n.o.p.q.r.s.t.u', 'admin');