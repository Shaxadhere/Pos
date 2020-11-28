<?php

include_once('../../config.php');

class ProductsModel{
    function List(){
        return fetchData(
            "tbl_products",
            connect()
        );
    }
    function Add(){

    }
    function Edit(){

    }
    function View(){

    }
    function Delete(){

    }
}






?>