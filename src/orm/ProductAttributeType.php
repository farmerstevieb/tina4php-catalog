<?php

class ProductAttributeType extends \Tina4\ORM
{
    public $tableName = "product_attribute_type";
    public $primaryKey = "id";

    public $id;
    public $product_id;
}