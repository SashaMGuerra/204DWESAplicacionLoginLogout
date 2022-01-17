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
     * Validación de usuario.
     * 
     * Comprueba si algún usuario de la base de datos coincide con el código
     * y password dados.
     * 
     * @param String $codigoUsuario Código del usuario a comprobar.
     * @param String $password Contraseña del usuario a comprobar.
     * @return Usuario|boolean Devuelve el objeto usuario creado si existe y la 
     * contraseña si es correcta, y false en caso contrario.
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
        $usuario = $oResultado->fetchObject();
        
        if($usuario){
            return new Usuario($usuario->T01_CodUsuario, $usuario->T01_Password, $usuario->T01_DescUsuario, $usuario->T01_NumConexiones, $usuario->T01_FechaHoraUltimaConexion, null, $usuario->T01_Perfil);
        }
        else{
            return false;
        }
    }
    
    /**
     * Inserción, registro de un usuario en la base de datos.
     * 
     * Inserta un nuevo usuario en la base de datos.
     * 
     * @param String $codigoUsuario Código del usuario que se va a registrar.
     * @param String $password Contraseña del usuario que se va a registrar.
     * @param String $descUsuario Descripción (nombre y apellidos) del usuario 
     * que se va a registrar.
     * @return Usuario|false Devuelve un objeto usuario nuevo si todo es correcto,
     * o false en caso contrario.
     */
    public static function altaUsuario($codigoUsuario, $password, $descUsuario){
        $sInsert = <<<QUERY
            INSERT INTO T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario, T01_FechaHoraUltimaConexion) VALUES
            ("{$codigoUsuario}", SHA2("{$codigoUsuario}{$password}", 256), "{$descUsuario}", UNIX_TIMESTAMP());
        QUERY;
        
        if(DBPDO::ejecutarConsulta($sInsert)){
            return new Usuario($_REQUEST['usuario'], $_REQUEST['password'], $_REQUEST['descripcion'], 1, time(), null, 'usuario');
        }
        else{
            return false;
        }
    }
    
    /**
     * Modificación de usuario.
     * 
     * Modifica la descripción e imagen del usuario indicado en la base de datos
     * y el propio objeto usuario.
     * 
     * @param Usuario $usuario Usuario a modificar.
     * @param String $descUsuario Nueva descripción que dar al usuario.
     * @param String $imagenUsuario Nueva imagen del usuario.
     * @return Usuario|false Devuelve el objeto usuario modificado si todo es correcto,
     * o false en caso contrario.
     */
    public static function modificarUsuario($usuario, $descUsuario, $imagenUsuario = ''){
        $sUpdate = <<<QUERY
            UPDATE T01_Usuario SET T01_DescUsuario = "{$descUsuario}",
            T01_ImagenUsuario = '{$imagenUsuario}'
            WHERE T01_CodUsuario = "{$usuario->getCodUsuario()}";
        QUERY;
            
        $usuario->setDescUsuario($descUsuario);
        $usuario->setImagenUsuario($imagenUsuario);
            
        if(DBPDO::ejecutarConsulta($sUpdate)){
            return $usuario;
        }
        else{
            return false;
        }
    }
    
    /**
     * Eliminación de usuario.
     * 
     * Elimina el usuario dado de la base de datos.
     * 
     * @param Usuario $usuario Usuario a ser eliminado.
     * @return PDOStatement Resultado del delete.
     */
    public static function borrarUsuario($usuario){
        $sDelete = <<<QUERY
            DELETE FROM T01_Usuario
            WHERE T01_CodUsuario='{$usuario->getCodUsuario()}';
        QUERY;
            
        return DBPDO::ejecutarConsulta($sDelete);
    }
    
    /**
     * Registro de una nueva conexión.
     * 
     * Dado un usuario, accede a la base de datos para añadir una nueva conexión:
     * añade una conexión y modifica la fecha-hora de última conexión.
     * Modifica el objeto para ser devuelto.
     * 
     * @param Usuario $usuario Usuario al que se registrará una nueva conexión
     * y que se modificará para devolverlo ya actualizado.
     * @return Usuario Usuario ya modificado.
     */
    public static function registrarUltimaConexion($usuario){
        $iFechaActual = time();
        $sUpdate = <<<QUERY
            UPDATE T01_Usuario SET T01_NumConexiones=T01_NumConexiones+1,
            T01_FechaHoraUltimaConexion = {$iFechaActual}
            WHERE T01_CodUsuario='{$usuario->getCodUsuario()}';
        QUERY;

        DBPDO::ejecutarConsulta($sUpdate);
            
        $usuario->setFechaHoraUltimaConexionAnterior($usuario->getFechaHoraUltimaConexion());
        $usuario->setFechaHoraUltimaConexion($iFechaActual);
        $usuario->setNumAccesos($usuario->getNumAccesos()+1);
            
        return $usuario;
    }
    
    /*
     * 
     */
    public static function buscaUsuariosporDesc(){
        
    }
    
    /**
     * Validación de existencia de usuario.
     * 
     * Busca un usuario según su código en la base de datos para conocer si ya existe.
     * 
     * @param String $codigoUsuario Código del usuario a comprobar su existencia.
     * @return Object|boolean Devuelve el objeto devuelto si ya existe en la
     * base de datos, o false si no.
     */
    public static function validarCodNoExiste($codigoUsuario){
        $sSelect = <<<QUERY
            SELECT T01_CodUsuario FROM T01_Usuario
            WHERE T01_CodUsuario='{$codigoUsuario}';
        QUERY;
            
        return DBPDO::ejecutarConsulta($sSelect)->fetchObject();
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
