<?php
    namespace model;
    use lib\model;
    class signup extends model
    {
        function authuser($email)
        {
            $db = \lib\db::singletone();
          
            $db->select(['email'],'users',"email = 'email' ");
          
            $res =  $db->query($sql);
          
            return $res; 
        }
        
        function countpassedemail($email)//function for count passed email from users table for auth if user is registered before 
        {
            $db = \lib\db::singletone();
            $res = $db->query("select count(*)  from tbl_users where email = '$email' ");
            $row = $res->fetch_assoc();
            return $row['count(*)'];
        }
    }
?>