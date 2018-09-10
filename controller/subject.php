<?php
namespace controller;
use \lib\controller;
class subject extends controller
{
    function add()
    {
        $inputs = ['id_phase','number_subject'	,'name' ,	'max_degree' , 'max_hours'];
        $header = 'subject';;
        $action = 'subject/auth_add';
        $form = new \controller\privatecontroller\genericform();
        $form->add($inputs,$header,$action);
    }
    function auth_add()
    {
        $request = \lib\request::singletone();
        $model = new \lib\model();
        $model->settable('subject');
        foreach($_POST as $key =>$var)
            $model->$key = $request->input($key);
        $model->save();
  
        $this->redirect('subject/add');
    }
    
    function show()
    {
        $model = new \lib\model();
        $columns =  ['id_phase','number_subject','name' ,'max_degree' , 'max_hours'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('subject');      
        $res = $model->selectAll();
        $rows= [];

        while($row = $res->fetch_assoc())
        {
            foreach( $row as $key=>$var ) 
                $rows[$key][] = $var;           
        }

        $form = new \controller\privatecontroller\genericform();

        $header = "subject";

        $action = "subject";
      
        $form->show( $columns , $rows , $header , "subject/edit","subject/remove" , "number_subject");
    }

    function remove($id)
    {
        $model = new \lib\model();
        $model->settable('subject');
        $model->delete("number_subject = '$id' ");
        $this->redirect('subject/show');   
    }
    function edit($id)
    {
        $fieldswillget  =  ['id_phase','name' ,'max_degree' , 'max_hours'];     
        $form = new \controller\privatecontroller\genericform();
        $model = new \lib\model();
        $model->settable('subject');
        $header = 'subject';;
        $action = "subject/authedit/$id";
        $postname = 'authedit';
        $form->edit( $fieldswillget , $header , $action , $postname ,   $model , $id , "number_subject" );
    }
    function authedit($id)
    {
        if( isset($_POST['authedit']) )
        {
            $request = \lib\request::singletone();
            $model = new \lib\model();
            $model->settable('subject');
            unset( $_POST['authedit'] );//for model update
            foreach($_POST as $key =>$var)
                $model->$key = $request->input($key);
            $model->update("number_subject = '$id'");
        }
        
         return $this->redirect("subject/edit/$id");
    } 
}

?>