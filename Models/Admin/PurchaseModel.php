<?php

include_once('../../config.php');

class PurchaseModel{

    function List(){
        return fetchData("tbl_purchased", connect());
    }

    function Add($FK_ProductPurchased, $Quantity, $DateTime){
        insertData(
            "tbl_purchased",
            array(
                "FK_ProductPurchased",
                "Quantity",
                "date"
            ),
            array(
                $FK_ProductPurchased,
                $Quantity,
                $DateTime
            ),
            connect()
        );
    }

    function View($id){
        return fetchDataById(
            "tbl_purchased",
            "PK_ID",
            $id,
            connect()
        );
    }

    function Edit($id, $Quantity, $DateTime){
        editData(
            "tbl_purchased",
            array(
                "Quantity",
                $Quantity,
                "date",
                $DateTime
            ),
            "PK_ID",
            $id,
            connect()
        );
    }

}

?>
