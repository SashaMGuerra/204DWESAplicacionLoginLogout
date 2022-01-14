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
    $_SESSION['paginaEnCurso'] = $_SESSION['error']->getPaginaSiguiente();
    header('Location: index.php');
    exit;
}

// Array con la información de la vista.
$aVError = [
    'error' => $_SESSION['error']->getDescError(),
    'codigo' => $_SESSION['error']->getCodError(),
    'archivo' => $_SESSION['error']->getArchivoError(),
    'linea' => $_SESSION['error']->getLineaError()
];

// Carga de la página de inicio.
require_once $aVistas['layout'];
    