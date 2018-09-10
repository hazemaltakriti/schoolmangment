<?php
    namespace lib;
    class file
    {
        private $fname;
    
        function __construct($fname)
        {
            $this->fname = $fname;
            
        }

        function write($content)
        {   
            $f = fopen($this->fname,'w');
    
            fwrite($f,$content);
    
            fclose($f);
    
            return $this;
        }
        function append( $content )
        {
           $temp =  file_get_contents( $this->fname   );
            file_put_contents( $this->fname  , $temp . ";\n" .  $content );
            return $this;
        }
          
        function jsonDecode()
        {
                return json_decode($this->getContent(),true);  
        }
    
        function jsonEncode()
        {
            return json_encode($this->getContent(),JSON_PRETTY_PRINT); 
        }
    
        function getContent()
        {
            return file_get_contents($this->fname);
        }
    }
?>