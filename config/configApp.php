<?php
/* 
 * @author Sasha
 * @since 15/11/2021
 * @version 1.0
 * 
 * Fichero de configuración de aplicación.
 */

// Constantes para el parámetro "obligatorio" de la validación de formularios.
define("OBLIGATORIO", 1);
define("OPCIONAL", 0);

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