<?php


\Tina4\Get::add("/catalog/product-attribute-value", function (\Tina4\Response $response){
    return $response (\Tina4\renderTemplate("/catalog/product-attribute-value/grid.twig"), HTTP_OK, TEXT_HTML);
});
        
/**
 * CRUD Prototype Product Modify as needed
 * Creates  GET @ /path, /path/{id}, - fetch,form for whole or for single
            POST @ /path, /path/{id} - create & update
            DELETE @ /path/{id} - delete for single
 */
\Tina4\Crud::route ("/catalog/product-attribute-value", new Product(), function ($action, Product $product, $filter, \Tina4\Request $request) {
    switch ($action) {
       case "form":
       case "fetch":
            //Return back a form to be submitted to the create
             
            if ($action == "form") {
                $title = "Add Product";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/product-attribute-value";
                $content = \Tina4\renderTemplate("/catalog/product-attribute-value/form.twig", []);
            } else {
                $title = "Edit Product";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/product-attribute-value/".$product->id;
                $content = \Tina4\renderTemplate("/catalog/product-attribute-value/form.twig", ["data" => $product]);
            }

            return \Tina4\renderTemplate("components/modalForm.twig", ["title" => $title, "onclick" => "if ( $('#productForm').valid() ) { saveForm('productForm', '" .$savePath."', 'message'); $('#formModal').modal('hide');}", "content" => $content]);
       break;
       case "read":
            //Return a dataset to be consumed by the grid with a filter
            $where = "";
            if (!empty($filter["where"])) {
                $where = "{$filter["where"]}";
            }
        
            return   $product->select ("*", $filter["length"], $filter["start"])
                ->where("{$where}")
                ->orderBy($filter["orderBy"])
                ->asResult();
        break;
        case "create":
            //Manipulate the $object here
        break;
        case "afterCreate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productGrid.ajax.reload(null, false); showMessage ('Product Created');</script>"];
        break;
        case "update":
            //Manipulate the $object here
        break;    
        case "afterUpdate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productGrid.ajax.reload(null, false); showMessage ('Product Updated');</script>"];
        break;   
        case "delete":
            //Manipulate the $object here
        break;
        case "afterDelete":
            //return needed 
            return (object)["httpCode" => 200, "message" => "<script>productGrid.ajax.reload(null, false); showMessage ('Product Deleted');</script>"];
        break;
    }
});