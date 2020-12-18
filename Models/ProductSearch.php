<?php

include_once('../../config.php');

class ProductSearch{
    function getResults($input){
        $query = "SELECT tbl_product.PK_ID, tbl_product.ProductName, tbl_product.ProductCode, tbl_stock.Quantity, tbl_product.Price, tbl_product.deleted FROM tbl_product 
        INNER JOIN tbl_stock ON tbl_stock.FK_Product = tbl_product.PK_ID where tbl_product.deleted = 0 and tbl_product.ProductName Like '$input%' OR `ProductCode` Like '$input%' LIMIT 5";
        return mysqli_query(connect(), $query);
        // return fetchDataLike(
        //     "tbl_product",
        //     array(
        //         "ProductName",
        //         $input,
        //         "ProductCode",
        //         $input
        //     ),
        //     5,
        //     connect()
        // );
        
    }
}


?>