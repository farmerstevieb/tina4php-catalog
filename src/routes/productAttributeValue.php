<?php


\Tina4\Get::add("/rest/V1/catalog/product-attribute-values", function (\Tina4\Response $response){
    return $response (\Tina4\renderTemplate("/catalog/product-attribute-values/grid.twig"), HTTP_OK, TEXT_HTML);
});
        
/**
 * CRUD Prototype ProductAttributeValues Modify as needed
 * Creates  GET @ /path, /path/{id}, - fetch,form for whole or for single
            POST @ /path, /path/{id} - create & update
            DELETE @ /path/{id} - delete for single
 */
\Tina4\Crud::route ("/catalog/product-attribute-values", new ProductAttributeValues(), function ($action, ProductAttributeValues $productAttributeValues, $filter, \Tina4\Request $request) {
    switch ($action) {
       case "form":
       case "fetch":
            //Return back a form to be submitted to the create
             
            if ($action == "form") {
                $title = "Add ProductAttributeValues";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/product-attribute-values";
                $content = \Tina4\renderTemplate("/catalog/product-attribute-values/form.twig", []);
            } else {
                $title = "Edit ProductAttributeValues";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/product-attribute-values/".$productAttributeValues->id;
                $content = \Tina4\renderTemplate("/catalog/product-attribute-values/form.twig", ["data" => $productAttributeValues]);
            }

            return \Tina4\renderTemplate("components/modalForm.twig", ["title" => $title, "onclick" => "if ( $('#productAttributeValuesForm').valid() ) { saveForm('productAttributeValuesForm', '" .$savePath."', 'message'); $('#formModal').modal('hide');}", "content" => $content]);
       break;
       case "read":
            //Return a dataset to be consumed by the grid with a filter
            $where = "";
            if (!empty($filter["where"])) {
                $where = "{$filter["where"]}";
            }
        
            return   $productAttributeValues->select ("*", $filter["length"], $filter["start"])
                ->where("{$where}")
                ->orderBy($filter["orderBy"])
                ->asResult();
        break;
        case "create":
            //Manipulate the $object here
        break;
        case "afterCreate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productAttributeValuesGrid.ajax.reload(null, false); showMessage ('ProductAttributeValues Created');</script>"];
        break;
        case "update":
            //Manipulate the $object here
        break;    
        case "afterUpdate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productAttributeValuesGrid.ajax.reload(null, false); showMessage ('ProductAttributeValues Updated');</script>"];
        break;   
        case "delete":
            //Manipulate the $object here
        break;
        case "afterDelete":
            //return needed 
            return (object)["httpCode" => 200, "message" => "<script>productAttributeValuesGrid.ajax.reload(null, false); showMessage ('ProductAttributeValues Deleted');</script>"];
        break;
    }
});