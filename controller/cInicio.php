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
 * Si no se ha hecho login (la variable de sesión del usuario no está definida),
 * devuelve al usuario a la página para hacerlo.
 */
if(!isset($_SESSION['usuarioDAW204AppLoginLogout'])){
    require_once $aControladores['login'];
    exit;
}

/*
 * Si se selecciona cerrar sesión, destruye la sesión y devuelve al usuario a la
 * página de login.
 */
if(isset($_REQUEST['logout'])){
    session_unset();
    session_destroy();
    
    require_once $aControladores['login'];
}

/*
 * Si se acaba de hacer login, se conecta a la base de datos para conocer cuántas
 * conexiones ha hecho el usuario.
 */
if(isset($_REQUEST['login'])){
    $sSelect = <<<QUERY
        SELECT T01_DescUsuario, T01_NumConexiones, T01_ImagenUsuario FROM T01_Usuario
        WHERE T01_CodUsuario='{$_SESSION['usuarioDAW204AppLoginLogout']}';
    QUERY;
    $oResultado = DBPDO::ejecutarConsulta($sSelect)->fetchObject();

    $iNumConexiones = $oResultado->T01_NumConexiones; 
    
    /*
    // Indicación al $_REQUEST que ya se ha hecho esta operación, por si se recarga la página.
    unset($_REQUEST['login']);
     * 
     */
}

// Carga de la página de inicio. Antes de requerir el layout, le indica qué vista debe requerir.
$sVistaEnCurso = 'inicio';
require_once $aVistas['layout'];
    