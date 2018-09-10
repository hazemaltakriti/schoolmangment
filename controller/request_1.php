<?php
namespace controller;
use \lib\controller;
class request_1 extends controller
{

    function show()
    {
        $model = new \model\request_all();
        $columns =  ['name' ,'number_stage','number_class','num_days'];
        $form = new \controller\privatecontroller\genericform();       
        $res = $model->reques_1();
        $rows= [];

        while($row = $res->fetch_assoc())
        {
           
            foreach( $row as $key=>$var ) 
                $rows[$key][] = $var;           
        }
        
        $form = new \controller\privatecontroller\genericform();

        $header = "Second Request";
      
        $form->show( $columns , $rows , $header , null,null , "name");
    }



}

?>