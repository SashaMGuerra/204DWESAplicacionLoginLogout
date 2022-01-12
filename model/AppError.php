<?php
/**
 * @author Sasha
 * @since 12/01/2022
 * @version 2.1
 * 
 * Clase que crea y utiliza errores generados en el uso de la aplicación
 * (excepciones).
 */

class AppError{
    private $message;
    private $code;
    private $file;
    private $line;
    private $errorInfo;
    private $xdebugMessage;
    
    function __construct($message, $file, $line, $errorInfo, $xdebugMessage) {
        $this->message = $message;
        $this->file = $file;
        $this->line = $line;
        $this->errorInfo = $errorInfo;
        $this->xdebugMessage = $xdebugMessage;
    }
    
    function getMessage() {
        return $this->message;
    }
    
    function getCode() {
        return $this->code;
    }

    function getFile() {
        return $this->file;
    }

    function getLine() {
        return $this->line;
    }

    function getErrorInfo() {
        return $this->errorInfo;
    }

    function getXdebugMessage() {
        return $this->xdebugMessage;
    }


}

