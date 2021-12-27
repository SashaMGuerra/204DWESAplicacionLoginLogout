<?php
/**
 * @author Sasha
 * @since 22/12/2021
 * @version 1.0
 * 
 * Controlador de la página de inicio.
 * Requiere la vista del inicio.
 */

/*
 * Si se selecciona cerrar sesión, destruye la sesión y devuelve al usuario a la
 * página de login.
 */
if(isset($_REQUEST['logout'])){
    session_unset();
    session_destroy();
    
    header('Location: index.php');
    exit;
}

/*
 * Conexión a la base de datos para conocer cuántas la descripción del usuario,
 * el número de conexiones que ha hecho y su imagen de usuario.
 */
$sSelect = <<<QUERY
    SELECT T01_DescUsuario, T01_NumConexiones, T01_ImagenUsuario FROM T01_Usuario
    WHERE T01_CodUsuario='{$_SESSION['usuarioDAW204AppLoginLogout']}';
QUERY;
$oResultado = DBPDO::ejecutarConsulta($sSelect)->fetchObject();

$sDescUsuario = $oResultado->T01_DescUsuario;
$iNumConexiones = $oResultado->T01_NumConexiones; 


// Carga de la página de inicio. Antes de requerir el layout, le indica qué vista debe requerir.
$sVistaEnCurso = 'inicio';
require_once $aVistas['layout'];
    