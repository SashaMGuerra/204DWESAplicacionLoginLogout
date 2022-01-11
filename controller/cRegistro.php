<?php
/**
 * @author Sasha
 * @since 04/01/2022
 * @version 2.0
 * 
 * Controlador de la página de registro.
 * Requiere la vista del registro.
 */

/**
 * Si se cancela, devuelve a la página de login.
 */
if(isset($_REQUEST['cancelar'])){
    $_SESSION['pagina'] = 'login';
    header('Location: index.php');
    exit;
}

// Variable de mensaje de error.
$sError = '';

/*
 * Si se selecciona crear usuario, crea el usuario y manda al usuario a la página
 * de inicio.
 */
if(isset($_REQUEST['anadirUsuario'])){    
    /*
     * Si el usuario, descripción o password no están definidos, o si se ha introducido de
     * forma incorrecta, pone la entrada como incorrecta.
     */
    if (validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 8, 4, OBLIGATORIO) ||
        validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 3, OBLIGATORIO) ||
            validacionFormularios::validarPassword($_REQUEST['password'], 8, 4, 1)) {
        $sError = 'Tanto el usuario como la contraseña deben tener entre 8 y 4 caracteres.<br>Nombre y apellidos deben tener mínimo 3 caracteres.';
    }
    /*
     * Si la entrada es correcta, comprueba si existe el usuario en la base de 
     * datos.
     */
    else{
        // Comprobación si el usuario ya existe.        
        $oUsuarioValido = UsuarioPDO::validarCodNoExiste($_REQUEST['usuario']);
        /*
         * Si el usuario no existe en la base de datos, lo crea, inicia sesión y manda al
         * usuario a la página de inicio.
         */
        if(!$oUsuarioValido){
            UsuarioPDO::altaUsuario($_REQUEST['usuario'], $_REQUEST['password'], $_REQUEST['descripcion']);
            
            // Almacenamiento del usuario y la fecha-hora de última conexión.
            $_SESSION['usuarioDAW204AppLoginLogout'] = new Usuario($_REQUEST['usuario'], $_REQUEST['password'], $_REQUEST['descripcion'], 1, time(), null, 'usuario');
            
            $_SESSION['pagina'] = 'inicio';
            header('Location: index.php');
            exit;
        }
        else{
            $sError = 'El usuario ya existe.';
        }
    }
}

// Carga de la vista del registro.
require_once $aVistas['layout'];
    