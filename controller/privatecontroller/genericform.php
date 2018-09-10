<?php
namespace controller\privatecontroller;
use lib\controller;
class genericform extends controller
{
    function show($columns,$rows , $header, $editaction = null, $removeaction = null,$pkname = 'id')
    {
        return $this->view('genericselect',
        [
            'columns'=>$columns,
            'rows'=>$rows ,
            'header'=>$header,
            'editaction'=>$editaction,
            'removeaction'=>$removeaction,
            'pkname' => $pkname
         ]);
    }

    function add($inputs , $header , $action)
    {
        $action = WEBSITE_NAME . DS . $action;
        return $this->view('genericadd',
        [
          'inputs'=>$inputs ,
          'header'=>$header,
          'action'=>$action 
        ]);
    }
    function edit($fieldswillget ,$header , $action , $postname ,  $model , $id ,$pkname='id')
    {
        $res = $model->select($fieldswillget,"$pkname='$id'");
        while( $row = $res->fetch_assoc())
        {
            foreach( $fieldswillget as $var   )
                $data[$var] = $row[$var]; 
        }  
        return $this->view('genericedit',[
            'fields'=>$data,
            'postname'=>$postname,
            'wantedfileds'=>$fieldswillget,
            'header'=>$header,
            'action'=>$action]);
    }
}
?>