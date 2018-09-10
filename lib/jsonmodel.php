<?php
namespace lib;
class jsonmodel extends model
{
    protected $path;//for set path of tables 


    function setPath($path)
    {
        $this->path = $path;
    }
    function save()
    {
        $db = jsondb :: singletone(); 
        $db->insert(/* $this->path . DS . */  $this->table,$this->data);  
    }
    function remove()
    {
        $db = jsondb ::singletone();
        $db->removeById($this->table , $this->data['id']);
    }
    function selectall()
    {
        $db = jsondb ::singletone();
        return $db->selectall($this->table);
    }
    function selectById()
    {
        $db = jsondb ::singletone();
       
        return $db->selectById('tt',$this->data['id']);    
    }
}
?>