<?php


\Tina4\Get::add("/rest/V1/catalog/product-skus", function (\Tina4\Response $response){
    return $response (\Tina4\renderTemplate("/catalog/product-skus/grid.twig"), HTTP_OK, TEXT_HTML);
});
        
/**
 * CRUD Prototype ProductSkus Modify as needed
 * Creates  GET @ /path, /path/{id}, - fetch,form for whole or for single
            POST @ /path, /path/{id} - create & update
            DELETE @ /path/{id} - delete for single
 */
\Tina4\Crud::route ("/catalog/product-skus", new ProductSkus(), function ($action, ProductSkus $productSkus, $filter, \Tina4\Request $request) {
    switch ($action) {
       case "form":
       case "fetch":
            //Return back a form to be submitted to the create
             
            if ($action == "form") {
                $title = "Add ProductSkus";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/product-skus";
                $content = \Tina4\renderTemplate("/catalog/product-skus/form.twig", []);
            } else {
                $title = "Edit ProductSkus";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/product-skus/".$productSkus->id;
                $content = \Tina4\renderTemplate("/catalog/product-skus/form.twig", ["data" => $productSkus]);
            }

            return \Tina4\renderTemplate("components/modalForm.twig", ["title" => $title, "onclick" => "if ( $('#productSkusForm').valid() ) { saveForm('productSkusForm', '" .$savePath."', 'message'); $('#formModal').modal('hide');}", "content" => $content]);
       break;
       case "read":
            //Return a dataset to be consumed by the grid with a filter
            $where = "";
            if (!empty($filter["where"])) {
                $where = "{$filter["where"]}";
            }
        
            return   $productSkus->select ("*", $filter["length"], $filter["start"])
                ->where("{$where}")
                ->orderBy($filter["orderBy"])
                ->asResult();
        break;
        case "create":
            //Manipulate the $object here
        break;
        case "afterCreate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productSkusGrid.ajax.reload(null, false); showMessage ('ProductSkus Created');</script>"];
        break;
        case "update":
            //Manipulate the $object here
        break;    
        case "afterUpdate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productSkusGrid.ajax.reload(null, false); showMessage ('ProductSkus Updated');</script>"];
        break;   
        case "delete":
            //Manipulate the $object here
        break;
        case "afterDelete":
            //return needed 
            return (object)["httpCode" => 200, "message" => "<script>productSkusGrid.ajax.reload(null, false); showMessage ('ProductSkus Deleted');</script>"];
        break;
    }
});
