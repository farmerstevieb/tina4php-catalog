<?php

class ProductAttributeValue extends \Tina4\ORM
{
    public $tableName = "product_attribute_value";
    public $primaryKey = "id";

    public $id;
    public $product_attribute_type_id;
}