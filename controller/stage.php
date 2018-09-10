<?php
namespace controller;
use \lib\controller;
class stage extends controller
{
    function add()
    {
        $inputs = ['number_stage','number_room','id_phase'];
        $header = 'stage';;
        $action = 'stage/auth_add';
        $form = new \controller\privatecontroller\genericform();
        $form->add($inputs,$header,$action);
    }
    function auth_add()
    {
        $request = \lib\request::singletone();
        $model = new \lib\model();
        $model->settable('stage');
        foreach($_POST as $key =>$var)
            $model->$key = $request->input($key);
        $model->save();
  
        $this->redirect('stage/add');
    }
    function show()
    {
        $model = new \lib\model();
        $columns =  ['number_stage','number_room','id_phase'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('stage');      
        $res = $model->selectAll();
        $rows= [];

        while($row = $res->fetch_assoc())
        {
            foreach( $row as $key=>$var ) 
                $rows[$key][] = $var;           
        }
       
        $form = new \controller\privatecontroller\genericform();

        $header = "student";

        $action = "student";
      
        $form->show( $columns , $rows , $header , null , "stage/remove  ","number_stage");
    }
    function remove($id)
    {
        $model = new \lib\model();
        $model->settable('stage');
        $model->delete("number_stage = '$id' ");
        $this->redirect('stage/show');   
    }
   
   
}

?>