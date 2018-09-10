<?php
namespace controller;
use \lib\controller;
class laboratory extends controller
{
    function add()
    {
        $inputs =['name'];
        $header = 'laboratory';;
        $action = 'laboratory/auth_add';
        $form = new \controller\privatecontroller\genericform();
        $form->add($inputs,$header,$action);
    }
    function auth_add()
    {
        $request = \lib\request::singletone();
        $model = new \lib\model();
        $model->settable('labortatory');
        foreach($_POST as $key =>$var)
            $model->$key = $request->input($key);
        $model->save();
        $this->redirect('laboratory/add');
    }
    
    function show()
    {
        $model = new \lib\model();
        $columns =  ['id','name'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('labortatory');      
        $res = $model->selectAll();
        $rows= [];

        while($row = $res->fetch_assoc())
        {
            foreach( $row as $key=>$var ) 
                $rows[$key][] = $var;           
        }

        $form = new \controller\privatecontroller\genericform();

        $header = "laboratory";
      
        $form->show( $columns , $rows , $header , "laboratory/edit","laboratory/remove");
    }

    function remove($id)
    {
        $model = new \lib\model();
        $model->settable('labortatory');
        $model->delete("id = '$id' ");
        $this->redirect('laboratory/show');   
    }
    function edit($id)
    {
        $fieldswillget = ['name'];      
        $form = new \controller\privatecontroller\genericform();
        $model = new \lib\model();
        $model->settable('labortatory');
        $header = 'student';;
        $action = "laboratory/authedit/$id";
        $postname = 'authedit';
        $form->edit( $fieldswillget , $header , $action , $postname ,   $model , $id );
    }
    function authedit($id)
    {
        if( isset($_POST['authedit']) )
        {
            $request = \lib\request::singletone();
            $model = new \lib\model();
            $model->settable('labortatory');
            unset( $_POST['authedit'] );//for model update
            foreach($_POST as $key =>$var)
                $model->$key = $request->input($key);
            $model->update("id = '$id'");
        }
         return $this->redirect("laboratory/edit/$id");
    } 
}

?>