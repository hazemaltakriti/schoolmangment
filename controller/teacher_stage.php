<?php
namespace controller;
use \lib\controller;
class teacher_stage extends controller
{
    function add()
    {
        $inputs = ['id_teacher','number_stage'];
         
        $header = 'teacher_stage';;
        $action = 'teacher_stage/auth_add';
        $form = new \controller\privatecontroller\genericform();
        $form->add($inputs,$header,$action);
    }
    function auth_add()
    {
        $request = \lib\request::singletone();
        $model = new \lib\model();
        $model->settable('teacher_stage');
        foreach($_POST as $key =>$var)
            $model->$key = $request->input($key);
        $model->save();
        $this->redirect('teacher_stage/add');
    }
    function show()
    {
        $model = new \lib\model();
        $columns =  ['number_stage','id_teacher'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('teacher_stage');      
        $res = $model->selectAll();
        $rows= [];

        while($row = $res->fetch_assoc())
        {
            foreach( $row as $key=>$var ) 
                $rows[$key][] = $var;           
        }

        $form = new \controller\privatecontroller\genericform();

        $header = "teacher_stage";

        $action = "student";
      
        $form->show( $columns , $rows , $header , "teacher_stage/edit","teacher_stage/remove");
    }
    function remove($id)
    {
        $model = new \lib\model();
        $model->settable('teacher_stage');
        $model->delete("id = '$id' ");
        $this->redirect('teacher_stage/show');   
    }
    function edit($id)
    {
        $fieldswillget = ['number_stage','id_teacher'];      
        $form = new \controller\privatecontroller\genericform();
        $model = new \lib\model();
        $model->settable('teacher_stage');
        $header = 'student';;
        $action = "teacher_stage/authedit/$id";
        $postname = 'authedit';
        $form->edit( $fieldswillget , $header , $action , $postname ,   $model , $id );
    }
    function authedit($id)
    {
        if( isset($_POST['authedit']) )
        {
            $request = \lib\request::singletone();
            $model = new \lib\model();
            $model->settable('teacher_stage');
            unset( $_POST['authedit'] );//for model update
            foreach($_POST as $key =>$var)
                $model->$key = $request->input($key);
            $model->update("id = '$id'");
        }
         return $this->redirect("teacher_stage/edit/$id");
    } 
}

?>