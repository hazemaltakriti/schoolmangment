<?php
namespace controller;
use \lib\controller;
class request_3 extends controller
{

    function show()
    {
        $model = new \model\request_all();
        $columns =  ['name'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('subject');      
        $res = $model->reques_3();
        
        $rows= [];

        while($row = $res->fetch_assoc())
        {
            
            foreach( $row as $key=>$var ) 
                $rows[$key][] = $var;           
        }

        $form = new \controller\privatecontroller\genericform();

        $header = "Third Request";
      
        $form->show( $columns , $rows , $header , null,null , "name");
    }



}

?>