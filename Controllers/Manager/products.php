<?php
include_once('../../config.php');
getHeader("Products", "header.php");



$fetched = fetchData("tbl_product", connect());

$error = "";

if(isset($_GET['error'])){
  $error = $_GET['error'];
}
         
?>

<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
             </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
    </div>
</div>


<h5 id="section4" class="mg-b-10">Products</h5>


<a href="#addnew" data-toggle="modal" class="btn btn-sm btn-outline-primary">Add New Product</a>

<br><br>

        <div data-label="Example" class="df-example demo-table">
          <table id="table" class="table">
            <thead>
              <tr>
                <th class="wd-20p">Product Name</th>
                <th class="wd-25p">Processor</th>
                <th class="wd-10p">Quantity</th>
                <th class="wd-10p">Purchased In</th>
                <th class="wd-10p"></th>
                
              </tr>
            </thead>
            <tbody>
              <?php

              while ($row = mysqli_fetch_array($fetched)) {
                echo "<tr>";
                echo "<td>".$row['ProductName']."</td>";
                echo "<td>".$row['Processor']."</td>";
                echo "<td>".$row['Quantity']."</td>";
                echo "<td>".$row['PurchasedIn']."</td>";
                echo "<td><button id='viewProduct' value='".$row['PK_ID']."' class='btn btn-xs btn-outline-info'>View</button></td>";
                echo "</tr>";
              }
              
              ?>
            </tbody>
          </table>
        </div><!-- df-example -->


      <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content tx-14">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel4">Add New Product</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">


          <form method="post" action="../../Model/products">

          <?php
          
          if(!empty($error)){
            echo "<div class='form-group'>";
            echo "<label for='error' style='color:red'>$error</label>";
            echo "</div>";
          }
          
          ?>

           <div class="form-group">
          <label>Product Name</label>
          <input type="text" required="Product Name is Required" name="ProductName" class="form-control" id="ProductName" placeholder="Macbok Pro 2020">
          </div>

          
        <div class="form-row">
          <div class="form-group col-md-5">
            <label>Specifications</label>
            <input type="text" required="Processor is required" name="Processor" class="form-control" placeholder="Processor">
          </div>
          <div class="form-group col-md-3 d-flex align-items-end">
            <input type="text" name="Ram" class="form-control" placeholder="Ram">
          </div>
          <div class="form-group col-md-4 d-flex align-items-end">
            <input type="text" name="Storage" class="form-control" placeholder="Storage">
          </div>
        </div>

        <div class="form-row">
           <div class="form-group col-md-6">
            <label for="inputEmail4">Purchased From</label>
            <input type="text" required="Vender name is required" name="PurchasedFrom" class="form-control" placeholder="Vendor Name">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Purchased In</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">PKR</span>
              </div>
              <input type="number" required="Purchased In is required" name="PurchasedIn" class="form-control">
              <div class="input-group-append">
                <span class="input-group-text">.00</span>
              </div>
          </div>
          </div>
          </div>

          <div class="form-row">
           <div class="form-group col-md-4">
            <label for="inputEmail4">Purchase Date</label>
            <input type="date" required="PurchaseDate is required" name="PurchaseDate" class="form-control hasDatepicker" placeholder="Choose date" id="datepicker5">
          </div>
          <div class="form-group col-md-4">
            <label for="inputPassword4">Quantity</label>
            <input type="number" required="Quantity is required" name="Qty" value="1" class="form-control" placeholder="1,2,3 etc">
          </div>
          <div class="form-group col-md-4">
            <label for="inputPassword4">Accessories</label>
            <input type="text" name="Accessories" class="form-control" placeholder="box, charger etc">
          </div>
          </div>

          <div class="form-group">
          <label for="inputAddress">Problem</label>
          <input type="text" name="Problem" class="form-control" id="Problem" placeholder="Write problem if any">
          </div>

          <div class="form-group">
          <label for="inputAddress">Description</label>
          <input type="text" name="Description" class="form-control" id="Description" placeholder="Describe your product..">
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
            <input name="addProduct" type="submit" class="btn btn-primary tx-13" value="Save changes">
            </form>
          </div>
        </div>
      </div>
    </div>


    <button id="view" href="#details" data-href="1" data-toggle="modal" class="btn btn-sm btn-outline-primary">View</button>

    <div id="modelForm"></div>


<?php
getFooter("footer.php");
?>
 <script> 

    $(document).ready(function () {
      $("#view").click(function () {
        // Get he content from the input box
        var uuid = 1
        $.ajax({
          type: "POST",
          url: "viewProduct",
          data: { uuid: uuid },
          success: function (response) {
            alert(response);
            $('#modelForm').replaceWith(response);
          },
          error: function (e) {
            alert(e); 
          }
        })
      });
    });



      $(function(){
        'use strict'

        $('#table').DataTable({
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

      });

      $(document).ready(function() {
        if(window.location.href.indexOf('#addnew') != -1) {
          $('#addnew').modal('show');
        }
      });

      // var today = new Date();
      // var dd = String(today.getDate()).padStart(2, '0');
      // var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      // var yyyy = today.getFullYear();

      // today = dd + '/' + mm + '/' + yyyy;
      // document.getElementById("#datepicker5").value = today;
         
    </script>