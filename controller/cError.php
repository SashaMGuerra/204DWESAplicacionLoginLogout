<?php
/**
 * @author Sasha
 * @since 12/01/2022
 * @version 2.1
 * 
 * Controlador para la página de mostrado de errores.
 */

// Si se selecciona cerrar la página y volver al inicio privado, lo hace.
if(isset($_REQUEST['cerrar'])){
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: index.php');
    exit;
}

// Array con la información de la vista.
$aVError = [
    'error' => $_SESSION['error']->getMessage(),
    'codigo' => $_SESSION['error']->getCode(),
    'archivo' => $_SESSION['error']->getFile(),
    'info' => $_SESSION['error']->getErrorInfo()
];

// Carga de la página de inicio.
require_once $aVistas['layout'];
    