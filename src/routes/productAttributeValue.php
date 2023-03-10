<?php


\Tina4\Get::add("/catalog/product-attribute-value", function (\Tina4\Response $response){
    return $response (\Tina4\renderTemplate("/catalog/product-attribute-value/grid.twig"), HTTP_OK, TEXT_HTML);
});
        
/**
 * CRUD Prototype ProductAttributeValue Modify as needed
 * Creates  GET @ /path, /path/{id}, - fetch,form for whole or for single
            POST @ /path, /path/{id} - create & update
            DELETE @ /path/{id} - delete for single
 */
\Tina4\Crud::route ("/catalog/product-attribute-value", new ProductAttributeValue(), function ($action, ProductAttributeValue $productAttributeValue, $filter, \Tina4\Request $request) {
    switch ($action) {
       case "form":
       case "fetch":
            //Return back a form to be submitted to the create
             
            if ($action == "form") {
                $title = "Add ProductAttributeValue";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/product-attribute-value";
                $content = \Tina4\renderTemplate("/catalog/product-attribute-value/form.twig", []);
            } else {
                $title = "Edit ProductAttributeValue";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/product-attribute-value/".$productAttributeValue->id;
                $content = \Tina4\renderTemplate("/catalog/product-attribute-value/form.twig", ["data" => $productAttributeValue]);
            }

            return \Tina4\renderTemplate("components/modalForm.twig", ["title" => $title, "onclick" => "if ( $('#productAttributeValueForm').valid() ) { saveForm('productAttributeValueForm', '" .$savePath."', 'message'); $('#formModal').modal('hide');}", "content" => $content]);
       break;
       case "read":
            //Return a dataset to be consumed by the grid with a filter
            $where = "";
            if (!empty($filter["where"])) {
                $where = "{$filter["where"]}";
            }
        
            return   $productAttributeValue->select ("*", $filter["length"], $filter["start"])
                ->where("{$where}")
                ->orderBy($filter["orderBy"])
                ->asResult();
        break;
        case "create":
            //Manipulate the $object here
        break;
        case "afterCreate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productAttributeValueGrid.ajax.reload(null, false); showMessage ('ProductAttributeValue Created');</script>"];
        break;
        case "update":
            //Manipulate the $object here
        break;    
        case "afterUpdate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productAttributeValueGrid.ajax.reload(null, false); showMessage ('ProductAttributeValue Updated');</script>"];
        break;   
        case "delete":
            //Manipulate the $object here
        break;
        case "afterDelete":
            //return needed 
            return (object)["httpCode" => 200, "message" => "<script>productAttributeValueGrid.ajax.reload(null, false); showMessage ('ProductAttributeValue Deleted');</script>"];
        break;
    }
});