<?php
namespace lib;
class upload
{
    static private $upload = null;
    function singletone()
    {
        
        if( self :: $upload == null  )
            self :: $upload = new self();
        return self ::$upload;
    }
    function uploadimg($file)
    {
        
        if( $file['name'] == null  )
            return null;
        $path = APP_PATH . DS . 'uploads' . DS . 'img';
        
        if( move_uploaded_file( $file['tmp_name'] , $path . DS . $file['name']) ) 
        {
            return $file['name'];
        }
            
        return null;
        
    }
    
   
}
?>