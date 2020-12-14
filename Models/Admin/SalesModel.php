<?php


class SalesModel{

    function List(){
        $query = "select tbl_sales.PK_ID, TotalBill, CustomerName, DateAdded, Mobile, City from tbl_sales inner join tbl_customer on tbl_sales.CustomerID = tbl_customer.PK_ID ORDER BY tbl_sales.PK_ID DESC";
        return mysqli_query(connect(), $query);
    }

    function getInvoice($salesId){
        $query = "select tbl_product.ProductName, tbl_invoice.Quantity from tbl_product INNER join tbl_invoice on tbl_product.PK_ID = tbl_invoice.FK_ProductInvoice where tbl_invoice.FK_Sales = $salesId";
        return mysqli_query(connect(), $query);
    }

    function getLastSales(){
        return getLastRow(
            "tbl_sales",
            "PK_ID",
            connect()
        );
    }
    
    function Add($totalBill, $CustomerID){
        return insertData(
            "tbl_sales",
            array(
                "DateAdded",
                "TotalBill",
                "CustomerID"
            ),
            array(
                date('Y-m-d h:i:s', time()),
                $totalBill,
                $CustomerID
            ),
            connect()
        );
    }

    function AddInvoice($ProductIds, $SalesId, $Quantities){
        for ($i=0; $i < count($ProductIds) ; $i++) { 
            insertData(
                "tbl_invoice",
                array(
                    "FK_ProductInvoice",
                    "FK_Sales",
                    "Quantity"
                ),
                array(
                    $ProductIds[$i],
                    $SalesId,
                    $Quantities[$i]
                ),
                connect()
            );
        }
    }
}

?>