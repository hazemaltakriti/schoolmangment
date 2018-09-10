<?php
namespace controller;
use \lib\controller;
class room extends controller
{
    function add()
    {
        $inputs = ['number_room','max_capacity','floor_num'];
        $header = 'room';;
        $action = 'room/auth_add';
        $form = new \controller\privatecontroller\genericform();
        $form->add($inputs,$header,$action);
    }
    function auth_add()
    {
        $request = \lib\request::singletone();
        $model = new \lib\model();
        $model->settable('room');
        foreach($_POST as $key =>$var)
            $model->$key = $request->input($key);
        $model->save();
  
        $this->redirect('room/add');
    }
    function show()
    {
        $model = new \lib\model();
        $columns =  ['number_room','max_capacity','floor_num'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('room');      
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
      
        $form->show( $columns , $rows , $header , "room/edit","room/remove" , "number_room");
    }
    function remove($id)
    {
        $model = new \lib\model();
        $model->settable('room');
        $model->delete("number_room = '$id' ");
        $this->redirect('room/show');   
    }
    function edit($id)
    {
        $fieldswillget =['max_capacity','floor_num'];      
        $form = new \controller\privatecontroller\genericform();
        $model = new \lib\model();
        $model->settable('room');
        $header = 'student';;
        $action = "room/authedit/$id";
        $postname = 'authedit';
        $form->edit( $fieldswillget , $header , $action , $postname ,   $model , $id , "number_room" );
    }
    function authedit($id)
    {
        if( isset($_POST['authedit']) )
        {
            $request = \lib\request::singletone();
            $model = new \lib\model();
            $model->settable('room');
            unset( $_POST['authedit'] );//for model update
            foreach($_POST as $key =>$var)
                $model->$key = $request->input($key);
            $model->update("number_room = '$id'");
        }
        
         return $this->redirect("room/edit/$id");
    } 
}

?>