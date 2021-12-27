<?php
/**
 * @author Sasha
 * @since 23/12/2021
 * @version 1.0
 * 
 * Clase para conexión de usuarios con la base de datos mediante PDO.
 */
class UsuarioPDO implements UsuarioDB{
    /**
     * Comprobación de la existencia previa de un usuario y de si su contraseña
     * es correcta en la base de datos.
     * 
     * @param String $codigoUsuario Código del usuario a comprobar.
     * @param String $password Contraseña del usuario a comprobar.
     * @return Object|boolean Devuelve el objeto únicamente con la FechaHoraUltimaConexion
     * si el usuario existe y la contraseña es correcta, y false en caso contrario.
     */
    public static function validarUsuario($codigoUsuario, $password) {
        /*
         * Query de selección del usuario según su código y contraseña, de modo
         * que valida tanto la existencia del usuario como que la contraseña
         * introducida sea correcta.
         */
        $sSelect = <<<QUERY
            SELECT T01_FechaHoraUltimaConexion FROM T01_Usuario
            WHERE T01_CodUsuario='{$codigoUsuario}' AND
            T01_Password=SHA2("{$codigoUsuario}{$password}", 256);
        QUERY;
        
        $oResultado = DBPDO::ejecutarConsulta($sSelect);
        $oUsuario = $oResultado->fetchObject();
        /*
         * Si no existe el objeto, devuelve false. Si existe, devuelve el objeto.
         */
        if(!$oUsuario){
            return false;
        }
        /*
         * Si existe el usuario, 
         */
        else{
            return self::registrarUltimaConexion($codigoUsuario);
        }
    }
    
    /**
     * 
     */
    public static function altaUsuario(){
        
    }
    
    /**
     * 
     */
    public static function modificarUsuario(){
        
    }
    
    /**
     * 
     */
    public static function borrarUsuario(){
        
    }
    
    /**
     * Dado un código de usuario, modifica la fecha-hora de última conexión, añade 
     * una conexión más, y devuelve el objeto.
     * @param String $codigoUsuario Código del usuario al que registrar una nueva conexión.
     * @return PDOStatement Resultado del update.
     */
    public static function registrarUltimaConexion($codigoUsuario){
        $sUpdate = <<<QUERY
            UPDATE T01_Usuario SET T01_NumConexiones=T01_NumConexiones+1,
            T01_FechaHoraUltimaConexion = unix_timestamp()
            WHERE T01_CodUsuario='{$codigoUsuario}';
        QUERY;

        return DBPDO::ejecutarConsulta($sUpdate);
    }
    
    /*
     * 
     */
    public static function buscaUsuariosporDesc(){
        
    }
    
    /**
     * 
     */
    public static function validarCodNoExiste(){
        
    }
    
    /*
     * 
     */
    public static function creaOpinion(){
        
    }
    
    /*
     * 
     */
    public static function modificaOpinion(){
        
    }
    
    /*
     * 
     */
    public static function borraOpinion(){
        
    }
}
