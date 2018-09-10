<?php
namespace lib\interfaces;

interface Ijsondb
{
    function singletone();
    function createtable(string $fname, array $arr);
    function addcol(string $fname,string $colname);
    function removecol(string $fname,string $colname);
    function insert(string $fname,array $arr);
    function removeById(string $fname,int $id);    
    function updateById(string $fname,array $arr,int $id);
    function selectByID( string $fname , int $id );
    function geterr();
}
?>