/**
 * Author:  Sasha
 * Fecha de creación: 25/11/2021
 *
 * Script creación de base de datos, tablas y usuario de conexión.
 */

/* Creación de la base de datos */
CREATE DATABASE IF NOT EXISTS DB204DWESLoginLogout;

USE DB204DWESLoginLogout;

/* Creación de las tablas */
CREATE TABLE IF NOT EXISTS T01_Usuario(
    T01_CodUsuario VARCHAR(8) PRIMARY KEY,
    T01_Password VARCHAR(64) NOT NULL, -- 64 porque el largo máximo es de 8 caracteres, más su codificación en SHA2.
    T01_DescUsuario VARCHAR(255) NOT NULL, -- Contiene nombre y apellidos del usuario.
    T01_FechaHoraUltimaConexion INT NOT NULL,
    T01_NumConexiones INT NOT NULL DEFAULT 1,
    T01_Perfil ENUM('administrador', 'usuario') DEFAULT 'usuario',
    T01_ImagenUsuario MEDIUMBLOB NULL
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS T02_Departamento(
    T02_CodDepartamento VARCHAR(3) PRIMARY KEY,
    T02_DescDepartamento VARCHAR(255) NOT NULL,
    T02_FechaCreacionDepartamento INT NOT NULL,
    T02_VolumenDeNegocio FLOAT NOT NULL,
    T02_FechaBajaDepartamento DATETIME NULL
) ENGINE=INNODB;

/* Creación del usuario */
CREATE USER IF NOT EXISTS 'User204DWESLoginLogout'@'%' IDENTIFIED BY 'paso';
GRANT ALL ON DB204DWESLoginLogout.* TO 'User204DWESLoginLogout'@'%';