-- Crear base de datos si no existe
CREATE DATABASE IF NOT EXISTS examen_php;

-- Utilizar la base de datos creada
USE examen_php;

-- Crear tabla CLIENTES si no existe
CREATE TABLE IF NOT EXISTS CLIENTES (
    Correo VARCHAR(255) PRIMARY KEY,
    Contrasena VARCHAR(255)
);

-- Crear tabla RESERVAS si no existe
CREATE TABLE IF NOT EXISTS RESERVAS (
    Fecha DATE,
    Hora TIME,
    Mesa INT,
    Descripción VARCHAR(255),
    Correo_cliente VARCHAR(255),
    FOREIGN KEY (Correo_cliente) REFERENCES CLIENTES(Correo),
    CONSTRAINT pk_reservas PRIMARY KEY (Fecha, Hora, Mesa)
);

-- Crear tabla EMPLEADOS si no existe
CREATE TABLE IF NOT EXISTS EMPLEADOS (
    Usuario VARCHAR(255) PRIMARY KEY,
    Contraseña VARCHAR(255)
);

-- Asegurarse de que haya al menos un empleado para poder registrar los demás
INSERT INTO EMPLEADOS (Usuario, Contraseña) VALUES ('admin', 'admin');
