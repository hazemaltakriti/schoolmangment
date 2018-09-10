<?php
    namespace lib;
    class regex
    {
        private static $regex = null;
        function singletone()
        {
            if( self::$regex == null )
                self ::$regex = new self;
            return self::$regex;
        }
        function isemail($var)
        {
            return filter_var($var,FILTER_VALIDATE_EMAIL);
        }
        function isdigit($var)
        {
            return is_numeric($var) || is_null($var);
        }
        function isname($var)
        {
            return preg_match("/^[a-zA-Z ]*$/",$var) ;
        }
        
    }
?>