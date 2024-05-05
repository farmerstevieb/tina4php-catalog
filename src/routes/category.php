<?php


\Tina4\Get::add("/rest/V1/catalog/category", function (\Tina4\Response $response){
    return $response (\Tina4\renderTemplate("/catalog/category/grid.twig"), HTTP_OK, TEXT_HTML);
});
        
/**
 * CRUD Prototype Category Modify as needed
 * Creates  GET @ /path, /path/{id}, - fetch,form for whole or for single
            POST @ /path, /path/{id} - create & update
            DELETE @ /path/{id} - delete for single
 */
\Tina4\Crud::route ("/catalog/category", new Category(), function ($action, Category $Category, $filter, \Tina4\Request $request) {
    switch ($action) {
       case "form":
       case "fetch":
            //Return back a form to be submitted to the create
             
            if ($action == "form") {
                $title = "Add Category";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/category";
                $content = \Tina4\renderTemplate("/catalog/category/form.twig", []);
            } else {
                $title = "Edit Category";
                $savePath =  TINA4_SUB_FOLDER . "/catalog/category/".$Category->id;
                $content = \Tina4\renderTemplate("/catalog/category/form.twig", ["data" => $Category]);
            }

            return \Tina4\renderTemplate("components/modalForm.twig", ["title" => $title, "onclick" => "if ( $('#CategoryForm').valid() ) { saveForm('CategoryForm', '" .$savePath."', 'message'); $('#formModal').modal('hide');}", "content" => $content]);
       break;
       case "read":
            //Return a dataset to be consumed by the grid with a filter
            $where = "";
            if (!empty($filter["where"])) {
                $where = "{$filter["where"]}";
            }
        
            return   $Category->select ("*", $filter["length"], $filter["start"])
                ->where("{$where}")
                ->orderBy($filter["orderBy"])
                ->asResult();
        break;
        case "create":
            //Manipulate the $object here
        break;
        case "afterCreate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>CategoryGrid.ajax.reload(null, false); showMessage ('Category Created');</script>"];
        break;
        case "update":
            //Manipulate the $object here
        break;    
        case "afterUpdate":
           //return needed 
           return (object)["httpCode" => 200, "message" => "<script>CategoryGrid.ajax.reload(null, false); showMessage ('Category Updated');</script>"];
        break;   
        case "delete":
            //Manipulate the $object here
        break;
        case "afterDelete":
            //return needed 
            return (object)["httpCode" => 200, "message" => "<script>CategoryGrid.ajax.reload(null, false); showMessage ('Category Deleted');</script>"];
        break;
    }
});