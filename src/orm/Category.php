<?php


class Category extends \Tina4\ORM
{
    public $tableName = "category";
    public $primaryKey = "id"; //set for primary key
    public $fieldMapping = ["id" => "id"];
    //public $softDelete=true; //uncomment for soft deletes in crud

    public $id;
}