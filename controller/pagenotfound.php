<?php
namespace controller;
use lib\controller;

class pagenotfound extends controller
{

    function controllernotfound()
    {
        return $this->view('pagenotfound',['error'=>'controller not found']);
    }
    
    function methodnotfound($nameobject)
    {
        return $this->view('pagenotfound',['error'=>"function not found in object $nameobject "]);
    }
    function argumentnotfound($className,$methodName)
    {
        return $this->view('pagenotfound',['error'=>"error in argument in  $className/$methodName "]); 
    }

}
?>