<?php
    namespace lib;
  
    class frontcontroller
    {
       private $_controller;

       private $_action;

       private $_param;
       
       function parseurl()
       {
            $url ="http://" .  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            
            $url=str_replace( WEBSITE_NAME , "" , $url  );
             
             $url=str_replace( '%20','',$url );

             $url=trim($url);
             
             $url=trim($url,'');

             $url=trim($url,'/');

             if(!$url=="")
             {
                $hash_url=explode('/',trim($url,'/'),3);
                if(isset($hash_url[0]))
                    $this->_controller=$hash_url[0];

                if(isset($hash_url[1]))
                    $this->_action=$hash_url[1];
                
                if(isset($hash_url[2]))
                    $this->_param=$hash_url[2];
               

                $this->_controller=trim($this->_controller);
                
                $this->_controller="\controller\\$this->_controller";
             }

             return $this;
       }
       private function fixpath($path)
       {
           return str_replace("\\","/",$path);
       }

       function call()
       {
           //if class is exist
           
           if( file_exists( $this->fixpath(APP_PATH . $this->_controller . '.php') ) )
           {      
            
                $_controller=new $this->_controller();
                  
                $this->_param=explode('/',$this->_param);  //make array from param
                if($this->_param[0] == '')
                    array_pop($this->_param);
                //if method existed in controller
                if(!method_exists($this->_controller,$this->_action)) 
                {
                    $_controller = new \controller\pagenotfound();
                    $_controller->methodnotfound($this->_controller); 
                }
                else
                {
                    
                    $reflection=new \ReflectionMethod($this->_controller,$this->_action);

                    $num_of_params = $reflection->getNumberOfParameters();
                    
                    //if arguement for function = argument in url
                    if($num_of_params == count($this->_param))// function for call controlerr\function\param (every thing is ok)                  
                        call_user_func_array( array( $_controller , $this->_action ), $this->_param);

                    else 
                    {
                        $_controller = new \controller\pagenotfound();
                        
                        $_controller->argumentnotfound($this->_controller,$this->_action); 
                       

                    }   
                    
                }
               
           }
           else 
           {
                $this->_controller=new \controller\pagenotfound();
                $this->_controller->controllernotfound(); 
           }
           return $this;

       }

    }

   
?>