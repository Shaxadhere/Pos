<?php

include_once('../../config.php');

class StockModel{

    function List(){
        return fetchData("tbl_stock", connect());
    }

    function Add($FK_Product, $Quantity){
        insertData(
            "tbl_stock",
            array(
                "FK_Product",
                "Quantity"
            ),
            array(
                $FK_Product,
                $Quantity
            ),
            connect()
        );
    }

    function View($id){
        return fetchDataById(
            "tbl_stock",
            "PK_ID",
            $id,
            connect()
        );
    }

    function Edit($id, $Quantity){
        editData(
            "tbl_stock",
            array(
                "Quantity",
                $Quantity
            ),
            "PK_ID",
            $id,
            connect()
        );
    }

}

?>
