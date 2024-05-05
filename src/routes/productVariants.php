<?php


\Tina4\Get::add("/rest/V1/catalog/product-variants", function (\Tina4\Response $response){
    return $response (\Tina4\renderTemplate("/catalog/product-variants/grid.twig"), HTTP_OK, TEXT_HTML);
});
        
/**
 * CRUD Prototype ProductVariants Modify as needed
 * Creates  GET @ /path, /path/{id}, - fetch,form for whole or for single
            POST @ /path, /path/{id} - create & update
            DELETE @ /path/{id} - delete for single
 */
\Tina4\Crud::route ("/catalog/product-variants", new ProductVariants(), function ($action, ProductVariants $productVariants, $filter, \Tina4\Request $request) {
    switch ($action) {
       case "form":
       case "fetch":
            //Return back a form to be submitted to the create
             
            if ($action == "form") {
                $title = "Add ProductVariants";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/product-variants";
                $content = \Tina4\renderTemplate("/catalog/product-variants/form.twig", []);
            } else {
                $title = "Edit ProductVariants";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/product-variants/".$productVariants->productId;
                $content = \Tina4\renderTemplate("/catalog/product-variants/form.twig", ["data" => $productVariants]);
            }

            return \Tina4\renderTemplate("components/modalForm.twig", ["title" => $title, "onclick" => "if ( $('#productVariantsForm').valid() ) { saveForm('productVariantsForm', '" .$savePath."', 'message'); $('#formModal').modal('hide');}", "content" => $content]);
       break;
       case "read":
            //Return a dataset to be consumed by the grid with a filter
            $where = "";
            if (!empty($filter["where"])) {
                $where = "{$filter["where"]}";
            }
        
            return   $productVariants->select ("*", $filter["length"], $filter["start"])
                ->where("{$where}")
                ->orderBy($filter["orderBy"])
                ->asResult();
        break;
        case "create":
            //Manipulate the $object here
        break;
        case "afterCreate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productVariantsGrid.ajax.reload(null, false); showMessage ('ProductVariants Created');</script>"];
        break;
        case "update":
            //Manipulate the $object here
        break;    
        case "afterUpdate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productVariantsGrid.ajax.reload(null, false); showMessage ('ProductVariants Updated');</script>"];
        break;   
        case "delete":
            //Manipulate the $object here
        break;
        case "afterDelete":
            //return needed 
            return (object)["httpCode" => 200, "message" => "<script>productVariantsGrid.ajax.reload(null, false); showMessage ('ProductVariants Deleted');</script>"];
        break;
    }
});
