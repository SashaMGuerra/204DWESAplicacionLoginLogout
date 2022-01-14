<?php
/**
 * @author Sasha
 * @since 12/01/2022
 * @version 2.1
 * 
 * Controlador de la ventana de detalle.
 * Muestra phpInfo y variables superglobales.
 */

/*
 * Si se selecciona volver, vuelve al índice.
 */
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: index.php');
    exit;
}

// Carga de la página de detalle.
require_once $aVistas['layout'];
    