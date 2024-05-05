<?php


\Tina4\Get::add("/rest/V1/catalog/products", function (\Tina4\Response $response){
    return $response (\Tina4\renderTemplate("/catalog/products/grid.twig"), HTTP_OK, TEXT_HTML);
});
        
/**
 * CRUD Prototype Products Modify as needed
 * Creates  GET @ /path, /path/{id}, - fetch,form for whole or for single
            POST @ /path, /path/{id} - create & update
            DELETE @ /path/{id} - delete for single
 */
\Tina4\Crud::route ("/catalog/products", new Products(), function ($action, Products $products, $filter, \Tina4\Request $request) {
    switch ($action) {
       case "form":
       case "fetch":
            //Return back a form to be submitted to the create
             
            if ($action == "form") {
                $title = "Add Products";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/products";
                $content = \Tina4\renderTemplate("/catalog/products/form.twig", []);
            } else {
                $title = "Edit Products";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/products/".$products->id;
                $content = \Tina4\renderTemplate("/catalog/products/form.twig", ["data" => $products]);
            }

            return \Tina4\renderTemplate("components/modalForm.twig", ["title" => $title, "onclick" => "if ( $('#productsForm').valid() ) { saveForm('productsForm', '" .$savePath."', 'message'); $('#formModal').modal('hide');}", "content" => $content]);
       break;
       case "read":
            //Return a dataset to be consumed by the grid with a filter
            $where = "";
            if (!empty($filter["where"])) {
                $where = "{$filter["where"]}";
            }
        
            return   $products->select ("*", $filter["length"], $filter["start"])
                ->where("{$where}")
                ->orderBy($filter["orderBy"])
                ->asResult();
        break;
        case "create":
            //Manipulate the $object here
        break;
        case "afterCreate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productsGrid.ajax.reload(null, false); showMessage ('Products Created');</script>"];
        break;
        case "update":
            //Manipulate the $object here
        break;    
        case "afterUpdate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>productsGrid.ajax.reload(null, false); showMessage ('Products Updated');</script>"];
        break;   
        case "delete":
            //Manipulate the $object here
        break;
        case "afterDelete":
            //return needed 
            return (object)["httpCode" => 200, "message" => "<script>productsGrid.ajax.reload(null, false); showMessage ('Products Deleted');</script>"];
        break;
    }
});