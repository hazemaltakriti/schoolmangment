<?php
namespace controller;
use \lib\controller;
class request1algebra extends controller
{
    function add()
    {
        $inputs = ['id_phase','number_stage','name','address','phone_number','stage','stage_type'];
        $header = 'request1algebra';;
        $action = 'request1algebra/auth_add';
        $form = new \controller\privatecontroller\genericform();
        $form->add($inputs,$header,$action);
    }
    function auth_add()
    {
        $request = \lib\request::singletone();
        $model = new \lib\model();
        $model->settable('request1algebra');
        foreach($_POST as $key =>$var)
            $model->$key = $request->input($key);
        $model->save();
  
        $this->redirect('request1algebra/add');
    }
    function show()
    {
        $model = new \lib\model();
        $columns =  ['name','id_teacher','number_subject','id_phase'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('query_1');      
        $res = $model->selectAll();
        $rows= [];

        while($row = $res->fetch_assoc())
        {
            foreach( $row as $key=>$var ) 
                $rows[$key][] = $var;           
        }

        $form = new \controller\privatecontroller\genericform();

        $header = "request1algebra";
        
        $action = "request1algebra";
      
        $form->show( $columns , $rows , $header , "request1algebra/edit","request1algebra/remove" , "name");
    }
    function remove($id)
    {
        $model = new \lib\model();
        $model->settable('request1algebra');
        $model->delete("number_request1algebra = '$id' ");
        $this->redirect('request1algebra/show');   
    }
    function edit($id)
    {
        $fieldswillget  =  ['name'];;     
        $form = new \controller\privatecontroller\genericform();
        $model = new \lib\model();
        $model->settable('query_1');
        $header = 'request1algebra';;
        $action = "request1algebra/authedit/$id";
        $postname = 'authedit';
        $form->edit( $fieldswillget , $header , $action , $postname ,   $model , $id , "name"  );
    }
    function authedit($id)
    {
        if( isset($_POST['authedit']) )
        {
            $request = \lib\request::singletone();
            $model = new \lib\model();
            $model->settable('query_1');
            unset( $_POST['authedit'] );//for model update
            foreach($_POST as $key =>$var)
                $model->$key = $request->input($key);
            $model->update("name = '$id'");
        }
       
         return $this->redirect("request1algebra/edit/$id");
    } 
}

?>