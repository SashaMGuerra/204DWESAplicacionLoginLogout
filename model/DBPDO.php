<?php
/**
 * @author Sasha
 * @since 23/12/2021
 * @version 1.0
 * 
 * Clase para conexión con la base de datos y ejecución de consultas mediante PDO.
 */
class DBPDO implements DB{
    /**
     * Conexión con la base de datos para ejecución de una consulta con o sin
     * parámetros.
     * 
     * @param String $sentenciaSQL Sentencia SQL a ejecutar.
     * @param Array|null $parametros Parámetros con los que completar la sentencia.
     * @return PDOStatement Resultado de la sentencia ejecutada.
     */
    public static function ejecutarConsulta($sentenciaSQL, $parametros = null) {
        try {
            // Conexión con la base de datos.
            $oDB = new PDO(HOST, USER, PASSWORD);
            $oDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Preparación y ejecución de la consulta con sus parámetros.
            $oResultado = $oDB->prepare($sentenciaSQL);
            $oResultado->execute($parametros);

            return $oResultado;
        } catch (PDOException $exception) {
            /*
             * Si sucede alguna excepción, 
             */
        } finally {
            unset($oDB);
        }
    }
}
