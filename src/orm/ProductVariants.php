<?php

class ProductVariants extends \Tina4\ORM
{
    public $tableName = "product_variants";
    public $primaryKey = "productId"; //set for primary key
    public $fieldMapping = ["productId" => "product_id", "skuId" => "sku_id", "attributeId" => "attribute_id", "attributeValueId" => "attribute_value_id"];
    //public $softDelete=true; //uncomment for soft deletes in crud

    public $productId;
    public $skuId;
    public $attributeId;
    public $attributeValueId;
}