<?php
namespace controller;
use \lib\controller;
class subject_teacher extends controller
{
    function add()
    {
        $inputs = ['id_teacher','number_subject'];
        $header = 'subject_teacher';;
        $action = 'subject_teacher/auth_add';
        $form = new \controller\privatecontroller\genericform();
        $form->add($inputs,$header,$action);
    }
    function auth_add()
    {
        $request = \lib\request::singletone();
        $model = new \lib\model();
        $model->settable('subject_teacher');
        foreach($_POST as $key =>$var)
            $model->$key = $request->input($key);
        $model->save();
      
        $this->redirect('subject_teacher/add');
    }
    function show()
    {
        $model = new \lib\model();
        $columns =  ['id_teacher','number_subject'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('subject_teacher');      
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
      
        $form->show( $columns , $rows , $header , "subject_teacher/edit","subject_teacher/remove");
    }
    function remove($id)
    {
        $model = new \lib\model();
        $model->settable('subject_teacher');
        $model->delete("id = '$id' ");
        $this->redirect('subject_teacher/show');   
    }
    function edit($id)
    {
        $fieldswillget = ['id_teacher','number_subject'];      
        $form = new \controller\privatecontroller\genericform();
        $model = new \lib\model();
        $model->settable('subject_teacher');
        $header = 'student';;
        $action = "subject_teacher/authedit/$id";
        $postname = 'authedit';
        $form->edit( $fieldswillget , $header , $action , $postname ,   $model , $id );
    }
    function authedit($id)
    {
        if( isset($_POST['authedit']) )
        {
            $request = \lib\request::singletone();
            $model = new \lib\model();
            $model->settable('subject_teacher');
            unset( $_POST['authedit'] );//for model update
            foreach($_POST as $key =>$var)
                $model->$key = $request->input($key);
            $model->update("id = '$id'");
        }
         return $this->redirect("subject_teacher/edit/$id");
    } 
}

?>