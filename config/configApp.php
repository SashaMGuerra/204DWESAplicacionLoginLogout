<?php

/* 
 * Autor: Isabel Martínez Guerra
 * Fecha: 15/11/2021
 * 
 * Fichero de configuración de aplicación.
 */

// Constantes para el parámetro "obligatorio" de la validación de formularios.
define("OBLIGATORIO", 1);
define("OPCIONAL", 0);

$aControladores = [
    'login' => 'controller/cLogin.php'
];

$aVistas = [
    'layout' => 'view/Layout.php',
    'login' => 'view/vLogin.php'
];