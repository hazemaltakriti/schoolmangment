<?php
    namespace lib;
    class security
    {
        function validate( $var )
        {
            $var = htmlspecialchars($var);
            $var = trim($var);
            return $var;
        }
    } 

?>