<?php
namespace lib;
use lib\db;
class Model
{
    protected $data = [];
    
    protected $table;

    function save()
    { 
        $db = db::singletone() ;
        $db->insert( $this->data , $this->table );
    }

    function __set($name,$val)
    {
        $this->data[$name]=$val;
    }
    
    function __get($name)
    {
        return $this->data[$name];
    }

    function setTable($table)
    {
        $this->table=$table;
    }
    function removefromdata($key)
    {
        if(isset($this->data[$key]))   
            unset($this->data[$key]);
    }
    function getTable()
    {
        if( !isset($this->table) )
        {
            $this->table = get_class($this).'s';
            
            #sanitize from namespace
                $this->table = explode('\\',$this->table );
                $this->table = end($this->table); 
            #end sanitize namespaces
        }

        return $this->table;
    }
    function getdata()
    {
        return $this->data;
    }

    function update($cond = null)
    {   
        $db = \lib\db::singletone();
        if( $cond == null )  
            $db->update( $this->data , $this->table );
        else
            $db->update( $this->data , $this->table , $cond);
    }

    function delete($cond = null )
    {
        
        $db = \lib\db::singletone();
        if( $cond == null )  
            $db->delete( $this->table  );
        else
            $db->delete( $this->table  , $cond);
        
    }

    function selectAll($id = null)
    {
        $db = db::singletone();
        return $db->selectAll($this->table,$id);
    }

    function selectById($data,$id)
    {
        $db = db::singletone();

        return $db->select($data, $this->table , " id ='$id' ");
    }
    function select($data,$cond=null)
    {      
        $db = db::singletone();
        
        return $db->select($data, $this->table , $cond); 
    }
   
    

}

?>