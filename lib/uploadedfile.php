<?php
namespace lib;
class uploadedfile
{
    static private $uploadedfile = null;
    function singletone()
    {
        if( self :: $uploadedfile == null  )
            self :: $uploadedfile = new self();
        return self ::$uploadedfile;
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