<?php

include_once('../../config.php');

class ProductModel{

    function List(){
        return fetchData("tbl_product", connect());
    }

    function Add($productCode, $productName, $price, $FK_Category, $FK_Company, $Image, $Features){
        insertData(
            "tbl_product",
            array(
                "ProductCode",
                "ProductName",
                "Price",
                "FK_Category",
                "FK_Company",
                "Image",
                "Features"
            ),
            array(
                $productCode,
                $productName,
                $price,
                $FK_Category,
                $FK_Company,
                $Image,
                $Features
            ),
            connect()
        );
    }

    function View($id){
        return fetchDataById(
            "tbl_product",
            "PK_ID",
            $id,
            connect()
        );
    }

    function Edit($id, $productCode, $productName, $price, $FK_Category, $FK_Company, $Image, $Features){
        editData(
            "tbl_product",
            array(
                "ProductCode",
                $productCode,
                "ProductName",
                $productName,
                "Price",
                $price,
                "FK_Category",
                $FK_Category,
                "FK_Company",
                $FK_Company,
                "Image",
                $Image,
                "Features",
                $Features
            ),
            "PK_ID",
            $id,
            connect()
        );
    }

    function Delete($id){
        deleteDataById(
            "tbl_product",
            "PK_ID",
            $id,
            connect()
        );
    }
}

?>
