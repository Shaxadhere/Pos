<?php

include_once('../../config.php');

class StocksModel{

    function List(){
        return fetchData("tbl_stock", connect());
    }

    function Add($stockName, $address, $postalCode, $landmark, $city, $state, $phone, $email, $fax, $mobile, $note){
        insertData(
            "tbl_stock",
            array(
                "stockName",
                "Address",
                "PostalCode",
                "Landmark",
                "City",
                "Province",
                "Phone",
                "Email",
                "Fax",
                "Mobile",
                "Note"
            ),
            array(
                $stockName,
                $address,
                $postalCode,
                $landmark,
                $city,
                $state,
                $phone,
                $email,
                $fax,
                $mobile,
                $note
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

    function Edit($id, $stockName, $address, $postalCode, $landmark, $city, $state, $phone, $email, $fax, $mobile, $note){
        editData(
            "tbl_stock",
            array(
                "stockName",
                $stockName,
                "Address",
                $address,
                "PostalCode",
                $postalCode,
                "Landmark",
                $landmark,
                "City",
                $city,
                "Province",
                $state,
                "Phone",
                $phone,
                "Email",
                $email,
                "Fax",
                $fax,
                "Mobile",
                $mobile,
                "Note",
                $note
            ),
            "PK_ID",
            $id,
            connect()
        );
    }

    function Delete($id){
        deleteDataById(
            "tbl_stock",
            "PK_ID",
            $id,
            connect()
        );
    }
}

?>
