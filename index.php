<?php
/**
 * @author Isabel Martínez Guerra
 * @since 21/12/2021
 * @version 1.0
 * 
 * Controlador principal de la aplicación.
 */

// Constantes de la aplicación.
require_once './config/configApp.php';

// Recuperación de la sesión para comprobar si ha iniciado sesión el usuario.
session_start();

/**
 * Si no se ha hecho login, manda al usuario a la página de login. Si no, a la
 * de inicio.
 */
if(!isset($_SESSION['usuarioDAW204AppLoginLogout'])){
    require_once $aControladores['login'];
    exit;
}
else{
    require_once $aControladores['inicio'];
}

