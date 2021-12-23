<?php
/**
 * @author Sasha
 * @since 22/12/2021
 * @version 1.0
 * 
 * Controlador del login.
 * Requiere la vista del login.
 */

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
        if(UsuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['password'])){
            require_once $aControladores['inicio'];
        }
        // Si el usuario no existe o la contraseña es incorrecta, devuelve a la página de login.
        else{
            $sVistaEnCurso = 'login';
            require_once $aVistas['layout'];
        }
    }
    /*
     * Si el usuario o contraseña se han introducido con un formato incorrecto,
     * devuelve a la página de login.
     */
    else{
        $sVistaEnCurso = 'login';
        require_once $aVistas['layout'];
    }
}
/*
 * Si no se ha intentado hacer login, se manda a la página para ello.
 */
else{
    $sVistaEnCurso = 'login';
    require_once $aVistas['layout'];
}