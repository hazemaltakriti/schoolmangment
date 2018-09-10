<?php
namespace controller;
use \lib\controller;
class student extends controller
{
    function add()
    {
        $inputs = ['id_phase','name','address','phone_number'];
        $header = 'student';;
        $action = 'student/auth_add';
        $form = new \controller\privatecontroller\genericform();
        $form->add($inputs,$header,$action);
    }
    function auth_add()
    {
        $request = \lib\request::singletone();
        $model = new \lib\model();
        $model->settable('student');
        foreach($_POST as $key =>$var)
            $model->$key = $request->input($key);
        $model->save();
  
        $this->redirect('student/add');
    }
    function show()
    {
        $model = new \lib\model();
        $columns =  ['id_phase','name','address','phone_number'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('student');      
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
      
        $form->show( $columns , $rows , $header , "student/edit","student/remove" , "id");
    }
    function remove($id)
    {
        $model = new \lib\model();
        $model->settable('student');
        $model->delete("id = '$id' ");
        $this->redirect('student/show');   
    }
    function edit($id)
    {
        $fieldswillget  =  ['id_phase','name','address','phone_number'];;     
        $form = new \controller\privatecontroller\genericform();
        $model = new \lib\model();
        $model->settable('student');
        $header = 'student';;
        $action = "student/authedit/$id";
        $postname = 'authedit';
        $form->edit( $fieldswillget , $header , $action , $postname ,   $model , $id  );
    }
    function authedit($id)
    {
        if( isset($_POST['authedit']) )
        {
            $request = \lib\request::singletone();
            $model = new \lib\model();
            $model->settable('student');
            unset( $_POST['authedit'] );//for model update
            foreach($_POST as $key =>$var)
                $model->$key = $request->input($key);
            $model->update("id = '$id'");
        }
        
         return $this->redirect("student/edit/$id");
    } 
}

?>