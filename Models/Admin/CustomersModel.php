<?php

include_once('../../config.php');

class CustomersModel{

    function List(){
        return fetchData("tbl_customer", connect());
    }

    function Add($customerName, $address, $postalCode, $landmark, $city, $state, $phone, $email, $fax, $mobile, $note){
        insertData(
            "tbl_customer",
            array(
                "CustomerName",
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
                $customerName,
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
            "tbl_customer",
            "PK_ID",
            $id,
            connect()
        );
    }

    function Edit($id, $customerName, $address, $postalCode, $landmark, $city, $state, $phone, $email, $fax, $mobile, $note){
        editData(
            "tbl_customer",
            array(
                "CustomerName",
                $customerName,
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
            "tbl_customer",
            "PK_ID",
            $id,
            connect()
        );
    }
}

?>
