<?php
/**
 * @author Sasha
 * @since 22/12/2021
 * @version 1.0
 * 
 * Controlador del login.
 * Requiere la vista del login.
 */

if(isset($_REQUEST['login'])){
    require_once $aControladores['inicio'];
}
else{
    // Antes de requerir el layout, le indica qué vista debe requerir.
    $sVistaEnCurso = 'login';
    require_once $aVistas['layout'];
}
