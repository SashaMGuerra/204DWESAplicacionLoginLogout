<?php
/**
 * @author Sasha
 * @since 23/12/2021
 * @version 1.0
 * 
 *  * Clase que crea y utiliza usuarios en la aplicación.
 */
class Usuario{
    private $codUsuario;
    private $password;
    private $descUsuario;
    private $numAccesos;
    private $fechaHoraUltimaConexion;
    private $fechaHoraUltimaConexionAnterior;
    private $perfil;
}