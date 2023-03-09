<?php

class ProductAttributeValue extends \Tina4\ORM
{
    public $tableName = "product_attribute_values";
    public $primaryKey = "id";

    public $id;
    public $product_attribute_type_id;
}