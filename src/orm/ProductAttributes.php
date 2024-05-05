<?php

class ProductAttributes extends \Tina4\ORM
{
    public $tableName = "product_attributes";
    public $primaryKey = "id"; //set for primary key
    public $fieldMapping = ["id" => "id", "productId" => "product_id", "attributeName" => "attribute_name", "attributeOrder" => "attribute_order"];
    //public $softDelete=true; //uncomment for soft deletes in crud

    public $id;
    public $productId;
    public $attributeName;
    public $attributeOrder;
}