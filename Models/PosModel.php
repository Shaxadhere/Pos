<?php

class POSModel{
    function fetchLastCustomer(){
        return getLastRow(
            "tbl_customer",
            "PK_ID",
            connect()
        );
    }
}

?>