<?php
namespace controller;
use \lib\controller;
class teacher extends controller
{
    function add()
    {
        $inputs = ['name','address','phone_number'];
        $header = 'teacher';;
        $action = 'teacher/auth_add';
        $form = new \controller\privatecontroller\genericform();
        $form->add($inputs,$header,$action);
    }
    function auth_add()
    {
        $request = \lib\request::singletone();
        $model = new \lib\model();
        $model->settable('teacher');
        foreach($_POST as $key =>$var)
            $model->$key = $request->input($key);
        $model->save();
        $this->redirect('teacher/add');
    }
    function show()
    {
        $model = new \lib\model();
        $columns =  ['id','name','address','phone_number'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('teacher');      
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
      
        $form->show( $columns , $rows , $header , "teacher/edit","teacher/remove");
    }
    function remove($id)
    {
        $model = new \lib\model();
        $model->settable('teacher');
        $model->delete("id = '$id' ");
        $this->redirect('teacher/show');   
    }
    function edit($id)
    {
        $fieldswillget = ['name','address','phone_number'];      
        $form = new \controller\privatecontroller\genericform();
        $model = new \lib\model();
        $model->settable('teacher');
        $header = 'student';;
        $action = "teacher/authedit/$id";
        $postname = 'authedit';
        $form->edit( $fieldswillget , $header , $action , $postname ,   $model , $id );
    }
    function authedit($id)
    {
        if( isset($_POST['authedit']) )
        {
            $request = \lib\request::singletone();
            $model = new \lib\model();
            $model->settable('teacher');
            unset( $_POST['authedit'] );//for model update
            foreach($_POST as $key =>$var)
                $model->$key = $request->input($key);
            $model->update("id = '$id'");
        }
         return $this->redirect("teacher/edit/$id");
    } 
}

?>