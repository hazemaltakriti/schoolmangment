<?php
namespace lib;
class view
{
    protected $layout=null;
    
    function __construct($viewname,$res=null)
    {
        if($res!=null)
           extract($res);

        if( $this->layout != null && !is_array($this->layout) )   
            require   LAYOUTS_DIR_HEADER . DS . $this->layout . '.php';

        require  APP_PATH .   DS . 'view' . DS . $viewname . '.php';

        if( $this->layout != null && !is_array($this->layout) )    if( $this->layout != null && !is_array($this->layout) )   
            require   LAYOUTS_DIR_FOOTER . DS . $this->layout . '.php';

         return $this;
    }
  
    

}


?>