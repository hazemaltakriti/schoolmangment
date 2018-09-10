<?php
namespace mvc\lib;
class GlobalFunction
{
    function objToArray($obj,$key)
    {
        $array=array();
        if($key == '' || $key == null)
            return $array;

         while( $row = $obj->fetch_assoc())
        {
            array_push($array,$row[$key]);
        } 
        return $array;
    }
    function varToArray()
    {

    }
    function hi()
    {
        echo 'hi';
    }
}


?>