<?php
include_once('../../config.php');
include_once('../../Models/Admin/SalesModel.php');
getHeader("Sales", "header.php");

$model = new SalesModel();

$fetched = $model->List();


$error = "";

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

?>

<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sales</li>
            </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
    </div>
</div>


<h5 id="section4" class="mg-b-10">Sales</h5>

<!--Table Starts-->
<div data-label="Example" class="df-example demo-table">
    <table id="table" class="table">
        <thead>
            <tr>
                <th class="wd-10p">Date</th>
                <th class="wd-10p">Customer Name</th>
                <th class="wd-10p">Mobile</th>
                <th class="wd-10p">City</th>
                <th class="wd-10p">Total Bill</th>
                <th class="wd-10p"></th>

            </tr>
        </thead>
        <tbody>
            <?php

            while ($row = mysqli_fetch_array($fetched)) {
                echo "<tr>";
                echo "<td>" . $row['DateAdded'] . "</td>";
                echo "<td>" . $row['CustomerName'] . "</td>";
                echo "<td>" . $row['Mobile'] . "</td>";
                echo "<td>" . $row['City'] . "</td>";
                echo "<td>" . $row['TotalBill'] . "</td>";
                echo "<td><center><button value='" . $row['PK_ID'] . "' class='btn btn-xs btn-outline-info viewSale'>View</button></center></td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</div>

<!--Table End-->

<div id="modelForm"></div>


<?php
getFooter("footer.php");
?>

<script>
    $(document).ready(function() {
        $(".viewSale").click(function() {
            // Get he content from the input box
            var uuid = this.value;
            $.ajax({
                type: "POST",
                url: "SalesView?uuid=" + uuid,
                success: function(response) {
                    $('#modelForm').empty();
                    $('#modelForm').append(response);
                },
                error: function(e) {
                    alert(e);
                }
            })
        });
    });

    /////////////////Datatable/////////////////
    $(function() {
        'use strict'
        $('#table').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            },
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>