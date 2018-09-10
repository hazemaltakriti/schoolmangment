<?php
namespace controller;
use \lib\controller;
class books extends controller
{

    function add()
    {
        $inputs = ['number_subject','name'];
        $header = 'books';;
        $action = 'books/auth_add';
        $form = new \controller\privatecontroller\genericform();
        $form->add($inputs,$header,$action);
    }
    
    function auth_add()
    {
        $request = \lib\request::singletone();
        $model = new \lib\model();
        $model->settable('books');
        foreach($_POST as $key =>$var)
            $model->$key = $request->input($key);
        $model->save();
        $this->redirect('books/add');
    }

    function show()
    {
        $model = new \lib\model();
        $columns =  ['number_subject','name'];
        $form = new \controller\privatecontroller\genericform();  
        $model->settable('books');      
        $res = $model->selectAll();
        $rows= [];

        while($row = $res->fetch_assoc())
        {
            foreach( $row as $key=>$var ) 
                $rows[$key][] = $var;           
        }

        $form = new \controller\privatecontroller\genericform();

        $header = "books";

        $action = "student";
      
        $form->show( $columns , $rows , $header , "books/edit","books/remove");
    }

    function remove($id)
    {
        $model = new \lib\model();
        $model->settable('books');
        $model->delete("id = '$id' ");
        $this->redirect('books/show');   
    }
    function edit($id)
    {
        $fieldswillget = ['name'];      
        $form = new \controller\privatecontroller\genericform();
        $model = new \lib\model();
        $model->settable('books');
        $header = 'student';;
        $action = "books/authedit/$id";
        $postname = 'authedit';
        $form->edit( $fieldswillget , $header , $action , $postname ,   $model , $id );
    }
    function authedit($id)
    {
        if( isset($_POST['authedit']) )
        {
            $request = \lib\request::singletone();
            $model = new \lib\model();
            $model->settable('books');
            unset( $_POST['authedit'] );//for model update
            foreach($_POST as $key =>$var)
                $model->$key = $request->input($key);
            $model->update("id = '$id'");
        }
         return $this->redirect("books/edit/$id");
    } 
    
}

?>