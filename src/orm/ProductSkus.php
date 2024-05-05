<?php

class ProductSkus extends \Tina4\ORM
{
    public $tableName = "product_skus";
    public $primaryKey = "id"; //set for primary key
    public $fieldMapping = ["id" => "id", "productId" => "product_id", "skuPrice" => "sku_price", "skuName" => "sku_name", "skuBarcode" => "sku_barcode", "skuStock" => "sku_stock"];
    //public $softDelete=true; //uncomment for soft deletes in crud

    public $id;
    public $productId;
    public $skuPrice;
    public $skuName;
    public $skuBarcode;
    public $skuStock;
}