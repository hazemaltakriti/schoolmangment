<?php
namespace controller;
use \lib\controller;
class request_2 extends controller
{

    function show()
    {
        $model = new \model\request_all();
        $columns =  ['num_algebra'];
        $form = new \controller\privatecontroller\genericform();       
        $res = $model->reques_2();
        $rows= [];

        while($row = $res->fetch_assoc())
        {
           
            foreach( $row as $key=>$var ) 
                $rows[$key][] = $var;           
        }
        
        $form = new \controller\privatecontroller\genericform();

        $header = "Second Request";
      
        $form->show( $columns , $rows , $header , null,null , "num_algebra");
    }



}

?>