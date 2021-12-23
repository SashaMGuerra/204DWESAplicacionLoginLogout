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
     * @param String $codigoUsuario Código del usuario a comprpobar.
     * @param String $password Contraseña del usuario a comprobar.
     * @return boolean Devuelve true si el usuario existe y la contraseña es correcta,
     * y false en caso contrario.
     */
    public static function validarUsuario($codigoUsuario, $password) {
        /*
         * Query de selección del usuario según su código y contraseña, de modo
         * que valida tanto la existencia del usuario como que la contraseña
         * introducida sea correcta.
         */
        $sSelect = <<<QUERY
            SELECT * FROM T01_Usuario
            WHERE T01_CodUsuario='{$codigoUsuario}' AND
            T01_Password=SHA2("{$codigoUsuario}{$password}", 256);
        QUERY;
        
        $oResultado = DBPDO::ejecutarConsulta($sSelect);
        /*
         * Si el fetch al resultado devuelve algún usuario, es decir, existe
         * y su contraseña coincide con la introducida, devuelve true.
         * En caso contrario, false.
         */
        if ($oResultado->fetchObject()) {
            return true;
        }
        else{
            return false;
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
     * 
     */
    public static function validarCodNoExiste(){
        
    }
}
