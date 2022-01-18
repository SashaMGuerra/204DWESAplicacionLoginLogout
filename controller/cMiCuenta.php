<?php
/**
 * @author Sasha
 * @since 17/01/2022
 * @version 2.2
 * 
 * Controlador de la ventana de miCuenta.
 * Permite ver y modificar información sobre el usuario, acceder al cambio de
 * contraseña y borrar la cuenta.
 */

// Si se selecciona cancelar, vuelve al índice privado sin hacer cambios.
if(isset($_REQUEST['cancelar'])){
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: index.php');
    exit;
}

// Si se selecciona cambiar contraseña, pasa a la ventana para ello.
if(isset($_REQUEST['cambiarPassword'])){
    $_SESSION['paginaEnCurso'] = 'cambiarPassword';
    header('Location: index.php');
    exit;
}

// Si se desea eliminar cuenta, lo hace, destruye la sesión y recarga el index.
if (isset($_REQUEST['eliminarCuenta'])) {
    UsuarioPDO::borrarUsuario($_SESSION['usuarioDAW204AppLoginLogout']);
    
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}

$aVMiCuenta = [
    'usuario' => $_SESSION['usuarioDAW204AppLoginLogout']->getCodUsuario(),
    'descripcion' => $_SESSION['usuarioDAW204AppLoginLogout']->getDescUsuario(),
    'numConexiones' => $_SESSION['usuarioDAW204AppLoginLogout']->getNumAccesos(),
    'fechaHoraUltimaConexion' => date('d/m/Y H:i:s e', $_SESSION['usuarioDAW204AppLoginLogout']->getFechaHoraUltimaConexion()),
    'perfil' => $_SESSION['usuarioDAW204AppLoginLogout']->getPerfil()
];

$aErrores = [
    'descripcion' => ''
];

// Si se desea efectuar cambios, valida la entrada.
if(isset($_REQUEST['aceptar'])){
    $bEntradaOK = true;
    
    // Validación de entrada.
    $aErrores['descripcion'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 3, OBLIGATORIO);
    
    // Si existe algún error, pone la entrada a false y limpia el campo.
    foreach ($aErrores as $campo => $error){
        if(!empty($error)){
            $bEntradaOK = false;
            $_REQUEST[$campo] = '';
        }
    }
}
/* Si no se ha seleccionado efectuar cambios, pone la entrada a false para que
 * no haga cambios.
 */
else{
    $bEntradaOK = false;
}

// Si la entrada es correcta, efectúa cambios.
if($bEntradaOK){
    // Recogida de nueva información.
    $aFormulario['descripcion'] = $_REQUEST['descripcion'];
        
    // Actualización en la base de datos.
    $_SESSION['usuarioDAW204AppLoginLogout'] = UsuarioPDO::modificarUsuario($_SESSION['usuarioDAW204AppLoginLogout'], $aFormulario['descripcion']);

    // Regreso al índice público.
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header('Location: index.php');
    exit;
}


// Carga de la página de detalle.
require_once $aVistas['layout'];
    