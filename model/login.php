<?php
namespace model;
use lib\model;

class  login extends Model
{

    function authuser($email,$password)
    {
        $db = \lib\db::singletone(); 
        $sql = "select count(*),id,username,email from tbl_users where email = '$email' and password = '$password' ";
        $res = $db->query($sql);
        return $res ;    
    }
}

?>