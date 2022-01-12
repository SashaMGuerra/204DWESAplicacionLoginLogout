<?php
/**
 * @author Sasha
 * @since 22/12/2021
 * @version 1.0
 * 
 * Controlador del login.
 * Requiere la vista del login.
 */

// Si se cancela la operación de login, regresa al inicio público.
if(isset($_REQUEST['cancelar'])){
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    header('Location: index.php');
    exit;
}

/*
 * Si se ha enviado el formulario para hacer login, comprueba que el usuario
 * y contraseña sean correctos para iniciar sesión.
 */
if(isset($_REQUEST['login'])){    
    /*
     * Si el usuario y password se han introducido de forma correcta, se conecta
     * con la base de datos para comprobar su existencia.
     */
    if (validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 8, 4, OBLIGATORIO) == null
            && validacionFormularios::comprobarAlfaNumerico($_REQUEST['password'], 8, 4, OBLIGATORIO) == null) {
        /**
         * Si el usuario existe y la contraseña es correcta, crea una nueva
         * sesión y lleva al usuario a la página de inicio.
         */
        $oUsuarioValido = UsuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['password']);
        if($oUsuarioValido){
            $_SESSION['usuarioDAW204AppLoginLogout'] = new Usuario($oUsuarioValido->T01_CodUsuario, $oUsuarioValido->T01_Password, $oUsuarioValido->T01_DescUsuario, $oUsuarioValido->T01_NumConexiones, time(), $oUsuarioValido->T01_FechaHoraUltimaConexion, $oUsuarioValido->T01_Perfil);
                        
            $_SESSION['paginaEnCurso'] = 'inicioPrivado';
            header('Location: index.php');
            exit;
        }
    }
}

/*
 * Si no se ha enviado el formulario, o si se ha enviado pero estaba incorrecto,
 * se muestra la vista del login.
 */
require_once $aVistas['layout'];