<?php

include_once('../../config.php');

class StockModel{

    function List(){
        return fetchData("tbl_stock", connect());
    }

    function ListStocksWithProduct(){
        return mysqli_query(connect(), "SELECT tbl_stock.PK_ID, Quantity, tbl_product.ProductCode, tbl_product.ProductName, tbl_product.Price, tbl_product.FK_Category FROM `tbl_stock` inner join tbl_product on tbl_stock.FK_Product = tbl_product.PK_ID where tbl_product.deleted = 0  ORDER BY `PK_ID` DESC");
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
        return mysqli_query(connect(), "SELECT tbl_stock.PK_ID, Quantity, tbl_product.ProductCode, tbl_product.ProductName, tbl_product.Price, tbl_product.FK_Category FROM `tbl_stock` inner join tbl_product on tbl_stock.FK_Product = tbl_product.PK_ID where tbl_product.deleted = 0 and tbl_stock.PK_ID = $id");
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
