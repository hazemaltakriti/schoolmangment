<?php
namespace controller;
use \lib\controller;
class labortatory_stage extends controller
{
    function add()
    {
        $inputs = ['id_laboratory','number_stage','usagetime','num_days'];
        $header = 'labortatory_stage';;
        $action = 'labortatory_stage/auth_add';
        $form = new \controller\privatecontroller\genericform();
        $form->add($inputs,$header,$action);
    }
    function auth_add()
    {
        $request = \lib\request::singletone();
        $model = new \lib\model();
        $model->settable('labortatory_stage');
        foreach($_POST as $key =>$var)
            $model->$key = $request->input($key);
        $model->save();
        $this->redirect('labortatory_stage/add');
    }
    function show()
    {
        $model = new \lib\model();
        $columns =  ['id_laboratory','number_stage','usagetime','num_days'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('labortatory_stage');      
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
      
        $form->show( $columns , $rows , $header , "labortatory_stage/edit","labortatory_stage/remove");
    }
    function remove($id)
    {
        $model = new \lib\model();
        $model->settable('labortatory_stage');
        $model->delete("id = '$id' ");
        $this->redirect('labortatory_stage/show');   
    }
    function edit($id)
    {
        $fieldswillget = ['id_laboratory','number_stage','usagetime','num_days'];      
        $form = new \controller\privatecontroller\genericform();
        $model = new \lib\model();
        $model->settable('labortatory_stage');
        $header = 'student';;
        $action = "labortatory_stage/authedit/$id";
        $postname = 'authedit';
        $form->edit( $fieldswillget , $header , $action , $postname ,   $model , $id );
    }
    function authedit($id)
    {
        if( isset($_POST['authedit']) )
        {
            $request = \lib\request::singletone();
            $model = new \lib\model();
            $model->settable('labortatory_stage');
            unset( $_POST['authedit'] );//for model update
            foreach($_POST as $key =>$var)
                $model->$key = $request->input($key);
            $model->update("id = '$id'");
        }
         return $this->redirect("labortatory_stage/edit/$id");
    } 
}

?>