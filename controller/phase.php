<?php
namespace controller;
use \lib\controller;
class phase extends controller
{
    
    function show()
    {
        $model = new \lib\model();
        $columns =  ['id','type'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('phase');      
        $res = $model->selectAll();
        $rows= [];

        while($row = $res->fetch_assoc())
        {
            foreach( $row as $key=>$var ) 
                $rows[$key][] = $var;           
        }

        $form = new \controller\privatecontroller\genericform();

        $header = "phase";
      
        $form->show( $columns , $rows , $header );
    }
   
}

?>