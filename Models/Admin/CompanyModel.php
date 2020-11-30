<?php

include_once('../../config.php');

class CompanyModel{

    function List(){
        return fetchData("tbl_productcompany", connect());
    }

    function Add($CompanyName){
        insertData(
            "tbl_productCompany",
            array(
                "CompanyName"
            ),
            array(
                $CompanyName
            ),
            connect()
        );
    }

    function View($id){
        return fetchDataById(
            "tbl_productCompany",
            "PK_ID",
            $id,
            connect()
        );
    }

    function Edit($id, $CompanyName){
        editData(
            "tbl_productCompany",
            array(
                "CompanyName",
                $CompanyName
            ),
            "PK_ID",
            $id,
            connect()
        );
    }

    function Delete($id){
        deleteDataById(
            "tbl_productCompany",
            "PK_ID",
            $id,
            connect()
        );
    }
}

?>
