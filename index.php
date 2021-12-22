<?php
/**
 * @author Isabel Martínez Guerra
 * @since 21/12/2021
 * @version 1.0
 * 
 * Controlador principal de la aplicación.
 */

// Constantes de la aplicación.
require_once './config/configApp.php';

/*
 * Para mostrar la ventana del login, llama al controlador del mismo.
 */
require_once $aControladores['login'];