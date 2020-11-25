<?php
include_once('../../config.php');
getHeader("Sales", "header.php");

$fetched = fetchData("tbl_sales", connect());
?>

<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="dashboard-one.html#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sales</li>
             </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
    </div>
</div>

<h5 id="section4" class="mg-b-10">Sales</h5>


<a href="#addnew" data-toggle="modal" class="btn btn-sm btn-outline-primary">Add Sale</a>

<br><br>

        <div data-label="Example" class="df-example demo-table">
          <table id="example4" class="table">
            <thead>
              <tr>
                <th class="wd-25p">Product Name</th>
                <th class="wd-20p">RAM</th>
                <th class="wd-20p">Storage</th>
                <th class="wd-20p">Customer</th>
                <th class="wd-20p">Amount</th>
                <th class="wd-20p"></th>
              </tr>
            </thead>
            <tbody>
              <?php

              while ($row = mysqli_fetch_array($fetched)) {
                echo "<tr>";
                echo "<td>Macbook Pro 2020</td>";
                echo "<td>".$row['Ram']."</td>";
                echo "<td>".$row['Storage']."</td>";
                echo "<td>".$row['CustomerName']."</td>";
                echo "<td>".$row['Amount']."</td>";
                
                echo "<td><a href='viewSale?uuid=".$row['PK_ID']."' class='btn btn-xs btn-outline-info'>View</a></td>";
                echo "</tr>";
              }
              
              ?>
            </tbody>
          </table>
        </div><!-- df-example -->


    <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel2">Add Sale</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">


          <form method="post" action="ProductModal">
           <div class="form-group">
          <label for="inputAddress">Product</label>
          <input autocomplete="false" type="text" class="form-control" id="inputAddress" placeholder="Macbok Pro 2020">
          </div>

          
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Specifications</label>
            <input type="text" class="form-control" placeholder="Ram">
          </div>
          <div class="form-group col-md-6 d-flex align-items-end">
            <input type="text" class="form-control" placeholder="Storage">
          </div>
        </div>

        <div class="form-row">
           <div class="form-group col-md-6">
            <label for="inputEmail4">Customer Name</label>
            <input type="text" class="form-control" placeholder="Customer Name">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Customer Contact</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">+92</span>
              </div>
              <input id="inputPhoneNumber" type="text" class="form-control" placeholder="Enter phone number"> 
            </div>
          </div>
          </div>

          <div class="form-row">
           <div class="form-group col-md-6">
            <label for="inputEmail4">Sale Date</label>
            <input type="date" class="form-control hasDatepicker" placeholder="Choose date" id="datepicker5">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Amount</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">PKR</span>
              </div>
              <input type="number" class="form-control">
              <div class="input-group-append">
                <span class="input-group-text">.00</span>
              </div>
          </div>

          </div>
          </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary tx-13" value="Save changes">
            </form>
          </div>
        </div>
      </div>
    </div>
        
    <div class="header-search" style="margin-top:5px">
      <input type="search" class="form-control " name="q" id="q" placeholder="Product" autocomplete="off">
          <ul class="search-ac" id="result-suggestion">
              <li><img src="/Images/Store/RXYlriEcKqd66dpzTA0482vzwxIUbjQVvD8kXb2kL2VFq5VhzCcS8l9p1Zou9jA09Sb2FEch7fSGGqJ1c1U9HynJ3iSym8L11u67.png" /><a href="/stores_/amie-skin-care" id="index-0" data-href="/search/amie-skin-care" class="index0">Amie Skin Care<br><span></span></a></li>
               <li><img src="/Images/Store/ZD7hmDi772jusFs4CyoKxsGnigjurvDenteqxBcjwCsGUviK4j08RB66xkyFUnfbZEHy0B6AVEOuAA2ny90I54WmXItND7ZIWQgP.png" /><a href="/stores_/stdcheck" id="index-0" data-href="/search/stdcheck" class="index0">STDCheck<br><span></span></a></li>
              <li><img src="/Images/Store/ojj3N0NNnb6xSKHkX7GuiUaSHSwoeF8kTMzOqwuERJzmbwutZfkoJm73I0Vu3Z8hCmeGKtu1cBd9VogLYDYzVja6f6FZaAbsaRjp.png" /><a href="/stores_/approved-vitamins" id="index-0" data-href="/search/approved-vitamins" class="index0">Approved Vitamins<br><span></span></a></li>

        </ul>                      
  </div>


<?php
getFooter("footer.php");
?>
 <script>
      $(function(){
        'use strict'

        $('#example4').DataTable({
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });


      $(document).ready(function () {
        $("#q").on("keyup", function () {
          var value = $(this).val().toLowerCase();
          $.ajax({
            type: "GET",
            url: "productSeach?q=" + value,
            async: true,
            success: function (text) {
              var res = text;
              $('#result-suggestion').html(text);
            }
          });
        });
      });
    </script>