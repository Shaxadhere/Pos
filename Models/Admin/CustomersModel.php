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


    function View(){

    }

    function Edit(){

    }

    function Delete(){

    }
}

?>
