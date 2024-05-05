<?php


\Tina4\Get::add("/rest/V1/catalog/product-attributes", function (\Tina4\Response $response){
    return $response (\Tina4\renderTemplate("/catalog/product-attributes/grid.twig"), HTTP_OK, TEXT_HTML);
});
        
/**
 * CRUD Prototype ProductAttributes Modify as needed
 * Creates  GET @ /path, /path/{id}, - fetch,form for whole or for single
            POST @ /path, /path/{id} - create & update
            DELETE @ /path/{id} - delete for single
 */
\Tina4\Crud::route ("/catalog/product-attributes", new ProductAttributes(), function ($action, ProductAttributes $productAttributes, $filter, \Tina4\Request $request) {
    switch ($action) {
       case "form":
       case "fetch":
            //Return back a form to be submitted to the create
             
            if ($action == "form") {
                $title = "Add ProductAttributes";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/product-attributes";
                $content = \Tina4\renderTemplate("/catalog/product-attributes/form.twig", []);
            } else {
                $title = "Edit ProductAttributes";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/product-attributes/".$productAttributes->id;
                $content = \Tina4\renderTemplate("/catalog/product-attributes/form.twig", ["data" => $productAttributes]);
            }

            return \Tina4\renderTemplate("components/modalForm.twig", ["title" => $title, "onclick" => "if ( $('#productAttributesForm').valid() ) { saveForm('productAttributesForm', '" .$savePath."', 'message'); $('#formModal').modal('hide');}", "content" => $content]);
       break;
       case "read":
            //Return a dataset to be consumed by the grid with a filter
            $where = "";
            if (!empty($filter["where"])) {
                $where = "{$filter["where"]}";
            }
        
            return   $productAttributes->select ("*", $filter["length"], $filter["start"])
                ->where("{$where}")
                ->orderBy($filter["orderBy"])
                ->asResult();
        break;
        case "create":
            //Manipulate the $object here
        break;
        case "afterCreate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productAttributesGrid.ajax.reload(null, false); showMessage ('ProductAttributes Created');</script>"];
        break;
        case "update":
            //Manipulate the $object here
        break;    
        case "afterUpdate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productAttributesGrid.ajax.reload(null, false); showMessage ('ProductAttributes Updated');</script>"];
        break;   
        case "delete":
            //Manipulate the $object here
        break;
        case "afterDelete":
            //return needed 
            return (object)["httpCode" => 200, "message" => "<script>productAttributesGrid.ajax.reload(null, false); showMessage ('ProductAttributes Deleted');</script>"];
        break;
    }
});