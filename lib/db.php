<?php
//this class for make queries for user
namespace lib;

class Db
{
    public static $db = null;

    function query($sql)
    {
       
        $conn=new \mysqli(SERVER_NAME,USER_NAME,PASSWORD,DATABASE_NAME);
        $res = $conn->query($sql);
        echo $conn->error;
        if( $conn->error != ""  )
            $_SESSION['error'] = $conn->error;
        else    
        {
            if( preg_match("/insert/",$sql) )
            {
                $f =  new file('queries');
                $f->append($sql);
            }
                     
        }
        $conn->close();

        return  $res; 
    }
   
    function singletone()
    {
        if( self::$db == null )
            self ::$db = new self;
        
        return self::$db;

    }
   
    //function for insert database and return lastid insert

    function insert($arr,$tablename)//this array must be like this arr["key1"=>value1,"key2"=>values2,....]
    {
        $tablename = $tablename;
        $keys = "(" .  implode(array_keys($arr),',') . ")";
        $values = "(" . '"' . implode(array_values($arr),'","') .'"'.  ")";
        $sql="insert into $tablename $keys values$values";

        return $this->query($sql);
        
    }

    function select($arr,$tablename,$cond=null)//this array of select key passing
    {
        $tablename=$tablename;
        
        $sql='select ';

        $sql .= implode(",",$arr);
        $sql .= " from $tablename";
        
        if($cond == null)
            return $this->query($sql);
        else
            $cond = " where $cond";
        $sql .= $cond;

   
        
        return $this->query($sql);
        
    }
    function selectAll($tablename , $id=null)
    {
        $tablename  =  $tablename;
        $sql ="";
        if($id != null)
            $sql  = "select * from $tablename where id = '$id' ";
        else
            $sql = "select * from $tablename  ";

            return $this->query($sql);
       
    }

    function delete($tablename,$cond='')//this array of select key passing
    {
      
        $tablename=$tablename;
        
        $sql='delete from '.$tablename;
        
        if($cond!='')
            $sql.=' where '.$cond;
       
       return  $this->query($sql);
        
    }

    function update($arr,$tablename,$cond=null)//this array has key=>value 
    {
        $tablename=$tablename;
        $sql='update '.$tablename.' set ';
        $fieldsAndVar='';//variable for register keys and value in it 
        foreach($arr as $key=>$var)
        {
            $fieldsAndVar .= $key.'='."'$var'".',';
        }
        
         $fieldsAndVar[strlen($fieldsAndVar)-1]=' ';

        if($cond==null)
            $sql.=$fieldsAndVar;
        else 
            $sql.=$fieldsAndVar.'where '.$cond;
           
        return $this->query($sql); 
       
    }
    function count($tablename,$cond=null)
    {
        $tablename =  $tablename;
        $sql = "select count(*) from $tablename ";
        if($cond != null)
            $sql .= "where $cond";
        return $this->query($sql);
    }
    function join( $tablename1,$tablename2 , $cond =null )
    {
        $tablename1 =  $tablename1;

        $tablename2 =  $tablename2;

        $sql = "select * from $tablename1 join $tablename2";
        
        if($cond != null)
            $sql .= " on $cond"; 
        return $this->query($sql);
    }

    function ListDb()
    {
        $sql='show databases';
        
        return DB::$conn->query($sql);
    }
    function ListTable($db)
    {
        
        $conn = new \mysqli('localhost','root','123456',$db);
        $sql='show tables';
        $res = $conn->query($sql);;
        return $res;
    }
    function ListCol($tablename)
    {
        $sql = "SHOW COLUMNS FROM learninglaravel.$tablename";
        return DB::$conn->query($sql);
    }
   

}



?>