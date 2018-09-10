<?php
namespace lib;

class controller 
{
    protected $header = null;
    protected $footer = null;
    protected $nav = null;
    
    protected function view($viewname,$data=null)
    {
      
        if($data!=null)
           extract($data);

        if( isset( $this->header )  )
            require LAYOUTS_DIR_HEADER . $this->header . '.php' ;
        require LAYOUTS_DIR_HEADER . 'master.php' ;

        if( isset( $this->nav )  )
            require LAYOUTS_DIR_NAVBAR . $this->nav .'.php' ;
        require LAYOUTS_DIR_NAVBAR . 'master.php' ;;
              

        require  APP_PATH .   DS . 'view' . DS .  'pages'. DS .  $viewname . '.php';

        if( isset( $this->footer )  )
            require LAYOUTS_DIR_FOOTER . $this->footer . '.php';
        require LAYOUTS_DIR_FOOTER . 'master.php' ;
      

         return $this;
    }

    protected function setlayout($header , $nav , $footer)
    {
        $this->header = $header;
        $this->footer = $footer;
        $this->nav = $nav;
    }    

    protected function redirect($dir)
    {
        $dir = WEBSITE_NAME . DS . $dir     ;

        header('Location:' . $dir );
    }
    protected function script($src)
    {
        echo "<script src = WEBSITE_NAME/$src ></script>";
    }
    private function sendwebsitennametoscript()
    {
        echo "<script> var WEBSITE_NAME=",WEBSITE_NAME,"</script>";
    }
    protected function convertmodeltoarray($arr)
    {
        $data = [];
       
        foreach( $data as $v )
        {
            
        }
    }
 

}

?>