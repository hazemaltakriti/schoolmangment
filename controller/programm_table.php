<?php
namespace controller;
use \lib\controller;
class programm_table extends controller
{
    function add()
    {
        $inputs = ['id_teacher','number_subject','number_stage','number_class','num_days'];
        $header = 'programm_table';;
        $action = 'programm_table/auth_add';
        $form = new \controller\privatecontroller\genericform();
        $form->add($inputs,$header,$action);
    }
    function auth_add()
    {
        $request = \lib\request::singletone();
        $model = new \lib\model();
        $model->settable('programm_table');
        foreach($_POST as $key =>$var)
            $model->$key = $request->input($key);
        $model->save();
     
        $this->redirect('programm_table/add');
    }
    function show()
    {
        $model = new \lib\model();
        $columns =  ['id_teacher','number_subject','number_stage','number_class','num_days'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('programm_table');      
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
      
        $form->show( $columns , $rows , $header , "programm_table/edit","programm_table/remove");
    }
    function remove($id)
    {
        $model = new \lib\model();
        $model->settable('programm_table');
        $model->delete("id = '$id' ");
        $this->redirect('programm_table/show');   
    }
    function edit($id)
    {
        $fieldswillget = ['id_teacher','number_subject','number_stage','number_class','num_days'];;      
        $form = new \controller\privatecontroller\genericform();
        $model = new \lib\model();
        $model->settable('programm_table');
        $header = 'student';;
        $action = "programm_table/authedit/$id";
        $postname = 'authedit';
        $form->edit( $fieldswillget , $header , $action , $postname ,   $model , $id );
    }
    function authedit($id)
    {
        if( isset($_POST['authedit']) )
        {
            $request = \lib\request::singletone();
            $model = new \lib\model();
            $model->settable('programm_table');
            unset( $_POST['authedit'] );//for model update
            foreach($_POST as $key =>$var)
                $model->$key = $request->input($key);
            $model->update("id = '$id'");
        }
         return $this->redirect("programm_table/edit/$id");
    } 
}

?>