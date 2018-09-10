<?php
namespace lib;

 class request extends security
 {
    private static $request = null;
    function singletone()
    {
        if(self::$request == null)
            self ::$request = new self();
        return self::$request;   
    }

    function input($var)
    {
        if( isset($_REQUEST[$var]) )
            return $this->validate($_REQUEST[$var]);
        return null;
    }

    function inputFile($name)
    {
        if( isset($_FILES[$name] ) )
            return $_FILES[$name];
        return null;
    }
 
 }

?>