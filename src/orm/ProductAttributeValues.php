<?php

class ProductAttributeValues extends \Tina4\ORM
{
    public $tableName = "product_attribute_values";
    public $primaryKey = "id"; //set for primary key
    public $fieldMapping = ["id" => "id", "productAttributeId" => "product_attribute_id", "attributeValue" => "attribute_value", "attributeValueOrder" => "attribute_value_order"];
    //public $softDelete=true; //uncomment for soft deletes in crud

    public $id;
    public $productAttributeId;
    public $attributeValue;
    public $attributeValueOrder;
}