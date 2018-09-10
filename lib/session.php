<?php
    namespace lib;
    class session
    {
        private static $session = null;
        function singletone()
        {
            if( self::$session == null )
                self ::$session = new self;
            
            return self::$session;
    
        }
        function set($key,$val)
        {
            $_SESSION[$key] = $val;
            return $this;
        }
        function get($key)
        {
            return $_SESSION[$key];
        }
    }
?>