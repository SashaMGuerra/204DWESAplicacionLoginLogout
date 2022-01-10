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
    
    function __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $fechaHoraUltimaConexionAnterior, $perfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numAccesos = $numAccesos;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
        $this->perfil = $perfil;
    }
    
    

}