-- departamento_ventas.sql

CREATE DATABASE IF NOT EXISTS DEPARTAMENTOS;

USE DEPARTAMENTOS;

CREATE TABLE IF NOT EXISTS empleados (
    DNI VARCHAR(10) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido1 VARCHAR(50) NOT NULL,
    apellido2 VARCHAR(50) NOT NULL,
    es_candidato BOOLEAN NOT NULL,
    vota_a VARCHAR(10) NULL,
    FOREIGN KEY (vota_a) REFERENCES empleados(DNI)
);

CREATE USER 'gestor_empleados'@'localhost' IDENTIFIED BY 'gestorGESTOR2';
GRANT ALL PRIVILEGES ON DEPARTAMENTOS.* TO 'gestor_empleados'@'localhost';
FLUSH PRIVILEGES;
-- Primero, inserta empleados que no votan a nadie
INSERT INTO empleados (DNI, nombre, apellido1, apellido2, es_candidato, vota_a)
VALUES
    ('111111111A', 'Juan', 'Gómez', 'López', true, NULL),
    ('333333333C', 'Ana', 'Rodríguez', 'García', true, NULL),
    ('555555555E', 'Laura', 'Sánchez', 'López', true, NULL),
    ('777777777G', 'Carmen', 'Díaz', 'Sanz', true, NULL);




