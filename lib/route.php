<?php
namespace lib;

class route
{
    static $iscalledback = false; // variable for prevent execute to get together
    static $namespace = 'controller';
    static $controller ;
    static $action ;
    static $params =[];

    static function get($str,$func = null,$namespace = 'controller')
    {
        if( $_SERVER['REQUEST_METHOD']  != 'GET' )
            return ;

        $url  = self::geturl();   
            
        $arr = explode("/",$url);

        if( $str != $arr[0] . '/' . $arr[1] )
            return ;

        if(isset($arr[2]))
        {
            self::$params =  explode("/",$arr[2]);
            echo "<pre>";
            
        }

        if( is_string($func) )
        {
             $arr  = explode(".",$func,3);

             if(isset($arr[0]))
             {
                 self::$controller =  $arr[0];
             }
             if(isset($arr[1]))
             {
                 self::$action =  $arr[1];
             }
            call_user_func_array( array( self::$namespace . DS .  self::$controller , self::$action ) , self::$params  );
        }
        else
        {
           $func();
        }
        
    }
    
    static function post($str,$func = null,$namespace='controller')
    {
        if( self::$iscalledback == true )
            return ;
        
       if( is_array($str) )
        {
            foreach( $str as $var )
            {
                if( !isset($_POST[$var]) )
                    return ;
            }   
            $func();
                self:: $iscalledback = true;    
        }   
    }
    static public function  redierect($dir)
    {
        
        self::dispatchdir($dir);
  
        if( !class_exists( self::$controller ) )
        {
            self::$controller = new \controller\pagenotfound();
            call_user_func_array( array( self::$controller, 'controllernotfound' ) , [] );            
        }
        else
        {
            if( !method_exists( self::$controller , self::$action )  )
            {
                self::$controller = new \controller\pagenotfound();
                
                call_user_func_array( array( self::$controller, "methodnotfound") ,  [self::$action]  );                      
                return ;
            }
            call_user_func_array( array( self :: $controller , self::$action ), self::$params); 
             
        }
           
        
      //  $controller = new self::$controller;

    }
    
    static function setnamespace($namespace)
    {
       self ::$namespace = 'controller' . '\\' .   $namespace;
    }
    //function for validate if accept url ( if get(str) is exist  ) 
    static function isacceptedurl($str)
    {
        $str = trim($str,'/');
        $url = self::geturl();
       
        if( $url ==  $str   )
            return true;
        return false;
    }
    //dispatch to controller , action , params
    static function dispatchdir($dir)
    {
        
        //processing if was set params 
       /* if( strpos("{",$dir) != null  )
       {
           //split url to params and (controller,action)
            $split_dir = preg_split("[{]" , $dir);
    
            str_replace("}","",$dir[1]);
            
            $namesparams = preg_split("[,]", $split_dir[1] );
       }
       if( isset($namesparams) )
            $controller_action =  str_replace("{" . $namesparams . "}","",$dir);
       else */
            $controller_action = $dir;
           
        $arr = explode( "/" , $controller_action , 3 );
        
        self::$controller = self::$namespace . '\\' . $arr[0];//get controller
        if( isset( $arr[1] ) )
            self::$action = $arr[1];//get action

        if( isset( $arr[2] ))
            self::$params = explode("/", $arr[2]);
    }
    
    //function for get url after fixing url from some charachters
    static function geturl()
    {
        $url=str_replace( '/'.APP_NAME.'/' ,'' , $_SERVER['REQUEST_URI']  );
        
        $url=str_replace( '%20','',$url );

        $url=trim($url);
        
        $url=trim($url,'');

        $url=trim($url,'/');

        $getpos = strpos($url,"?"); 
        
        $url = $getpos == null ?  $url : substr($url , 0 , $getpos)  ;
        
        return $url;
    }
   
}

?>