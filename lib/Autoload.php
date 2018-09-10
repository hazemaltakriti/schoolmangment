<?php
 
 namespace lib; 

class Autoload
{
  
    public static function autoloading($classname)
    {
        $classname = str_replace('\\','/',$classname);
             if( file_exists( APP_PATH.DS . $classname . '.php' ) )
                require_once APP_PATH . DS . $classname . '.php'  ; 
                
           
    }   

}

spl_autoload_register( __NAMESPACE__ . DS . 'Autoload::autoloading' );
 

 $frontController=new frontcontroller();
 
 $frontController->parseurl()->call();
?>