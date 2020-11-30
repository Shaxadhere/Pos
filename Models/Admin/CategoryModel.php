<?php

include_once('../../config.php');

class CategoryModel{

    function List(){
        return fetchData("tbl_productcategory", connect());
    }

    function Add($categoryName){
        insertData(
            "tbl_productcategory",
            array(
                "CategoryName"
            ),
            array(
                $categoryName
            ),
            connect()
        );
    }

    function View($id){
        return fetchDataById(
            "tbl_productcategory",
            "PK_ID",
            $id,
            connect()
        );
    }

    function Edit($id, $categoryName){
        editData(
            "tbl_productcategory",
            array(
                "CategoryName",
                $categoryName
            ),
            "PK_ID",
            $id,
            connect()
        );
    }

    function Delete($id){
        deleteDataById(
            "tbl_productcategory",
            "PK_ID",
            $id,
            connect()
        );
    }
}

?>
