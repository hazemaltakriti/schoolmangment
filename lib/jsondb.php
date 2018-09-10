<?php
    namespace lib;
    use lib\file;
    use lib\interfaces\ijsondb;

    class jsondb implements ijsondb
    {
        
        private static $db ;

        private $printerr = true;
        
        function singletone()
        {
            if (!isset(self::$db)) 
            {
                self::$db = new self;
            }
            return self::$db;
        }
    
        function createtable(string $fname,array $arr)//here we have to pass assciative array for column in table 
        {
            try
            {
               
                if( file_exists($fname . '.json') )
                {
                    throw new \Exception("file is existing before");
                }
                if( isset($arr['id']) )
                {
                    throw  new \Exception('you canont add col id');
                }
               
                $file = new file($fname . '.json');
    
                $jsarr['counter']=1;
    
                $jsarr['table']['id']=[];
    
                foreach($arr as $var)
                {
                    
                    array_shift($arr);
                    $jsarr['table'][$var]=$arr[$var]=[];
                }
                
                $file->write(json_encode($jsarr,JSON_PRETTY_PRINT));
    
            }catch(\Exception $e)
            {
                if($this->printerr  == true)
                    echo $e->getMessage();
                else 
                    $this->err = $e->getMessage();
            }
        }
    
        function addcol(string $fname,string $colname)
        {
            try
            {
                if( !file_exists($fname . '.json') )
                    throw new \Exception("file is not exist");
               
              
    
                $file = new file($fname .  '.json');
    
                $jsarr = $file->jsonDecode();
                
                if( isset( $jsarr['table'][$colname] ) )
                    throw new \Exception("$colname is existed before");
                //throw new \Exception("key is existed before");
             
                $length = count( $jsarr['table']['id'] );
    
                $jsarr['table'][$colname] = array_fill(0,$length,"");
           
                $file->write(json_encode($jsarr,JSON_PRETTY_PRINT));
    
            }catch(\Exception $e)
            {
                if($this->printerr  == true)
                    echo $e->getMessage();
                 else 
                   $this->err =  $e->getMessage();
            }
    
            return $this;
        }
    
        function removecol(string $fname,string $colname)
        {
            try
            {
                if( !file_exists($fname . '.json') )
                    throw new Exeption('file does not exist');
                $file = new file($fname . '.json');
                
                $jsarr = $file->jsonDecode();
    
                if( !isset( $jsarr['table'][$colname] ) )
                    throw new \Exception("key is not exist in $fname");
                
                if(  $colname == 'id' )
                    throw new \Exception("you can not remove id key ");
    
                unset( $jsarr['table'][$colname] );
              
                $file->write(json_encode($jsarr,JSON_PRETTY_PRINT));
                
    
    
            }catch(\Exception $e)
            {
                echo $e->getMessage();
            }
        }
    
        function insert(string $fname,array $arr)//  array for insert in json file 
        {
    
            $file = new file($fname .  '.json');
    
            $jsarr = $file->jsonDecode();
     
            try
            {
            
                //part for validate if al key is exist in my file
                foreach($arr as $key=>$var)
                {
                    if( !isset($jsarr['table'][$key]) )
                    {
                      throw new \Exception("$key doesnot exist in this table");  
                    }
                }
                $jsarr['table']['id'][]=$jsarr['counter'];//part for insert auto id 
                //part for set null value in key which isnot passed in parameter $arr , insert parameter $arr in $target array
                foreach($jsarr['table'] as $key=>$val)
                {
                    if($key!='id')
                    {
                        if( !isset($arr[$key]) )
                        {
                            $arr[$key]="";
                        }
                        $jsarr['table'][$key][]=$arr[$key];                    
                    }
                   
                }
                $jsarr['counter']++;//for conservation counter after each insert 
                //end configuration last array($jsarr)
                $file->write(json_encode($jsarr,JSON_PRETTY_PRINT));
            } 
            catch(\Exception $e)
            {
                if($this->printerr  == true)
                    echo $e->getMessage();
                else 
                    $this->err =  $e->getMessage();
            }
            
        } 
    
        function removeById( string $fname , int $id )
        {   
            try
            {
              
                if( !file_exists($fname  . '.json') )
                    throw new \Exception('file is not exist');
                    
                $file = new file($fname .  '.json');
                $jsarr = $file->jsonDecode();
                $index = array_search($id,$jsarr['table']['id']);
                if($index === false)
                    throw new \Exception("the id does not exist in this table");
                //part #1 for deleting targeted row 
                foreach($jsarr['table'] as $key=>$var)
                {
                    unset($jsarr['table'][$key][$index]);
                }
                //end part #1
                //part #2 for deleting indexes from columns array
                foreach($jsarr['table'] as $key=>$var)
                {
                    $jsarr['table'][$key] = array_values($jsarr['table'][$key]);
                }
                //end part #2
               $file->write( json_encode($jsarr,JSON_PRETTY_PRINT) );
    
            }catch(\Exception $e)
            {
                if($this->printerr  == true)
                    echo $e->getMessage();
                else 
                    $this->err =  $e->getMessage();
            }
        }
    
        function updateById(string $fname ,array $arr , int $id )//arr parameter is associative array
        {
            try
            {
                //part #0 for validate if file is exist && get index of id if file is exist && target index is exist
                if( !file_exists($fname . '.json') )
                        throw new \Exception("file does not exist");
    
                $file = new file($fname . '.json');
    
                $jsarr = $file->jsonDecode();
    
                $index  = array_search( $id , $jsarr['table']['id'] );
               
                if($index === false)
                    throw new \Exception("the id=$id does not exist in this table");
          
                //end part#0
    
               //part #1 for update array which was exist in target file
                foreach($arr as $key=>$val)
                {
                    if( !isset($jsarr['table'][$key]) )//for validate if key is exist in table
                        throw new \Exception("$key does not exist in target table in $fname");
                    $jsarr['table'][$key][$index] = $val;
                   
                }
                //end part #1
                //part #2(last part) for update target file
                $file->write(json_encode($jsarr,JSON_PRETTY_PRINT));
            }catch(\Exception $e)
            {
                if($this->printerr  == true)
                    echo $e->getMessage();
                else 
                    $this->err =  $e->getMessage();
            }
        }
    
        function selectByID( string $fname , int $id )
        {
            try
            {
                if( !file_exists( $fname .  '.json' ) )
                    throw new \Exception("file isnot exist");
                
                $file = new file($fname . '.json');
             
                $jsarr = $file->jsonDecode();
    
                $index =  array_search($id,$jsarr['table']['id']);
                
                if($index === false)
                    throw new \Exception("this $id doesnot exist");
                    $targetrow = [];
                    
                foreach($jsarr['table'] as $key=>$val )
                        $targetrow[$key] = $jsarr['table'][$key][$index];
                return $targetrow;
                
    
            }catch(\Exception $e)
            {
                if( $this->printerr )
                    echo $e->getMessage();
                else 
                    $this->err = $e->getMessage();
            }
        }
        function selectAll(string $fname)
        {
            try
            {
                if( !file_exists( $fname .  '.json' ) )
                    throw new \Exception("file is not exist");
                
                $file = new file($fname . '.json');
             
                $jsarr = $file->jsonDecode();
    
                return $jsarr['table'];
                
    
            }catch(\Exception $e)
            {
                if( $this->printerr )
                    echo $e->getMessage();
                else 
                    $this->err = $e->getMessage();
            }
        }
    
        function geterr()
        {
            return  $this->err;
        }
        
    }
?>