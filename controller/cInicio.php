<?php
/**
 * @author Sasha
 * @since 22/12/2021
 * @version 1.0
 * 
 * Controlador de la página de inicio.
 * Requiere la vista del inicio.
 */

if(isset($_REQUEST['logout'])){
    require_once $aControladores['login'];
}
else{
    // Antes de requerir el layout, le indica qué vista debe requerir.
    $sVistaEnCurso = 'inicio';
    require_once $aVistas['layout'];
}