<?php

class Products extends \Tina4\ORM
{
    public $tableName = "products";
    public $primaryKey = "id"; //set for primary key
    public $fieldMapping = ["id" => "id", "productName" => "product_name", "productDescription" => "product_description", "productImage" => "product_image", "price" => "price", "inStock" => "in_stock"];
    //public $softDelete=true; //uncomment for soft deletes in crud

    public $id;
    public $productName;
    public $productDescription;
    public $productImage;
    public $price;
    public $inStock;
}