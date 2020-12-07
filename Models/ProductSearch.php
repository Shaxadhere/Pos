<?php

include_once('../../config.php');

class ProductSearch{
    function getResults($input){
        return fetchDataLike(
            "tbl_product",
            array(
                "ProductName",
                $input,
                "ProductCode",
                $input
            ),
            5,
            connect()
        );
        
    }
}


?>