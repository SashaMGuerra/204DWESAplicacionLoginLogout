<?php
/* 
 * @author Sasha
 * @since 15/11/2021
 * @version 1.0
 * 
 * Fichero de configuración de aplicación.
 */

// Librería de validación de formularios.
require_once 'core/libreriaValidacion.php';

// Constantes para el parámetro "obligatorio" de la validación de formularios.
define("OBLIGATORIO", 1);
define("OPCIONAL", 0);

// Constantes para la conexión a la base de datos.
require_once 'config/configDB.php';

// Requerimiento de todas las clases que componen la aplicación.
require_once 'model/Usuario.php';
require_once 'model/UsuarioDB.php';
require_once 'model/UsuarioPDO.php';
require_once 'model/DB.php';
require_once 'model/DBPDO.php';

// Directorios de los controladores.
$aControladores = [
    'login' => 'controller/cLogin.php',
    'inicio' => 'controller/cInicio.php'
];

// Directorios de las vistas.
$aVistas = [
    'layout' => 'view/Layout.php',
    'login' => 'view/vLogin.php',
    'inicio' => 'view/vInicio.php'
];