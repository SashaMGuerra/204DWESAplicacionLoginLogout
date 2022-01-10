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

/*
 * Inicio o recuperación de la sesión.
 */
session_start();

var_dump($_SESSION);

/*
 * Si la variable de sesión que indica la página a cargar no está indicada,
 * o si está indicada pero no se ha hecho login, carga con el login.
 */
if(!isset($_SESSION['pagina']) || !isset($_SESSION['usuarioDAW204AppLoginLogout'])){
    $_SESSION['pagina'] = $aControladores['login'];
}
// En cualquier otro caso, se carga el inicio.
else{
    $_SESSION['pagina'] = $aControladores['inicio'];
}

// Si se quiere registrar, manda a la página de registro.
if(isset($_REQUEST['registrarse'])){
    $_SESSION['pagina'] = $aControladores['registro'];
}

// Cargado de la página indicada.
require_once $_SESSION['pagina'];