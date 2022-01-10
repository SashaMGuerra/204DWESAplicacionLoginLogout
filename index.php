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

// Inicio o recuperación de la sesión.
session_start();

/*
 * Si no hay una página a cargar indicada y además no se ha hecho login, carga 
 * el login.
 */
if(!isset($_SESSION['pagina']) && !isset($_SESSION['usuarioDAW204AppLoginLogout'])){
    $_SESSION['pagina'] = $aControladores['login'];
}

// Cargado de la página indicada.
require_once $_SESSION['pagina'];