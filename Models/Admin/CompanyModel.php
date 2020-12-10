<?php

include_once('../../config.php');

class CompanyModel{

    function List(){
        return verifyValues(
            "tbl_productcompany",
            array(
                "deleted",
                false
            ),
            connect()
        );
    }

    function Add($CompanyName){
        insertData(
            "tbl_productcompany",
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
            "tbl_productcompany",
            "PK_ID",
            $id,
            connect()
        );
    }

    function Edit($id, $CompanyName){
        editData(
            "tbl_productcompany",
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
        editData(
            "tbl_productcompany",
            array(
                "deleted",
                true
            ),
            "PK_ID",
            $id,
            connect()
        );
    }
}

?>
