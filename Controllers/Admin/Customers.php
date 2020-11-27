<?php
include_once('../../config.php');
include_once('../../Models/Admin/CustomersModel.php');
getHeader("Cutomers", "header.php");

$model = new CustomersModel();

$fetched = $model->List();


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
                <li class="breadcrumb-item active" aria-current="page">Customers</li>
             </ol>
        </nav>
        <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
    </div>
</div>


<h5 id="section4" class="mg-b-10">Customers</h5>


<a href="#addnew" data-toggle="modal" class="btn btn-sm btn-outline-primary">Add New Customer</a>

<br><br>

        <div data-label="Example" class="df-example demo-table">
          <table id="table" class="table">
            <thead>
              <tr>
                <th class="wd-20p">Customer Name</th>
                <th class="wd-25p">City</th>
                <th class="wd-10p">Mobile</th>
                <th class="wd-10p">Email</th>
                <th class="wd-10p"></th>
                
              </tr>
            </thead>
            <tbody>
              <?php

              while ($row = mysqli_fetch_array($fetched)) {
                echo "<tr>";
                echo "<td>".$row['CustomerName']."</td>";
                echo "<td>".$row['City']."</td>";
                echo "<td>".$row['Mobile']."</td>";
                echo "<td>".$row['Email']."</td>";
                echo "<td><button id='viewProduct' value='".$row['PK_ID']."' class='btn btn-xs btn-outline-info'>View</button></td>";
                echo "</tr>";
              }
              
              ?>
            </tbody>
          </table>
        </div><!-- df-example -->



        <!--Add New Form-->

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


          <form method="post" action="<?= $_HTMLROOTURI ?>/Models/Admin/Customers.php" autocomplete="off">

          <?php
          
          if(isset($_GET['CustomerName'])){
            $error = $_GET['CustomerName'];
          }

          if(!empty($error)){
            echo "<span for='error' style='color:red'>$error</span>";
            echo "<br>";
          }
          
          ?>

           <div class="form-group">
          <label>Customer Name</label>
          <input type="text" required="Customer Name is Required" name="CustomerName" class="form-control" id="CustomerName" placeholder="Ali Sethi.. etc">
          </div>

          
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Address</label>
            <input type="text" required="Address is required" name="Address" class="form-control" placeholder="Suite, Apt..etc">
          </div>
        </div>

        <div class="form-row">
           <div class="form-group col-md-3">
            <label for="inputEmail4">State</label><br>
            <input id="theStates" type="text" required="State is required" name="State" class="form-control" placeholder="State">
          </div>
          <div class="form-group col-md-3">
            <label for="inputEmail4">City</label><br>
            <input id="theCities" type="text" required="City is required" name="City" class="form-control" placeholder="City">
          </div>
          <div class="form-group col-md-3">
            <label for="inputEmail4">Postal Code</label><br>
            <input id="PostalCode" type="text" required="Postal Code is required" name="PostalCode" class="form-control" placeholder="PostalCode">
          </div>
          <div class="form-group col-md-3">
            <label for="inputEmail4">Landmark</label><br>
            <input id="landmark" type="text" name="Landmark" class="form-control" placeholder="Landmark">
          </div>
          </div>

          <div class="form-row">
           <div class="form-group col-md-4">
            <label for="inputEmail4">Email</label>
            <input type="email" name="Email" class="form-control" placeholder="abc@example.com">
          </div>
          <div class="form-group col-md-4">
            <label for="inputPassword4">Mobile</label>
            <input type="phone" required="Mobile is required" name="Mobile" class="form-control" placeholder="Mobile number">
          </div>
          <div class="form-group col-md-4">
            <label for="inputPassword4">Phone</label>
            <input type="phone" name="Phone" class="form-control" placeholder="Phone number">
          </div>
          </div>

          <div class="form-group">
          <label for="inputAddress">Fax</label>
          <input type="text" name="Fax" class="form-control" id="Fax" placeholder="Fax number">
          </div>

          <div class="form-group">
          <label for="inputAddress">Note</label>
          <input type="text" name="Note" class="form-control" id="Note" placeholder="Any notes..">
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
            <input name="addCustomer" type="submit" class="btn btn-primary tx-13" value="Save">
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- <button id="view" href="#details" data-href="1" data-toggle="modal" class="btn btn-sm btn-outline-primary">View</button> -->

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


    /////////////////States/////////////////
    var substringMatcher = function(strs) {
    return function findMatches(q, cb) {
      var matches, substrRegex;
      matches = [];
      substrRegex = new RegExp(q, 'i');
      $.each(strs, function(i, str) {
        if (substrRegex.test(str)) {
          matches.push(str);
        }
      });
    
      cb(matches);
    };
    };
    
    var states = ['Sindh', 'Punjab', 'Balochistan', 'KPK'];
    
    $('#theStates').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
    },
    {
    name: 'states',
    source: substringMatcher(states)
    });

    ///////////////////City/////////////////
    var substringMatcher = function(strs) {
    return function findMatches(q, cb) {
      var matches, substrRegex;
      matches = [];
      substrRegex = new RegExp(q, 'i');
      $.each(strs, function(i, str) {
        if (substrRegex.test(str)) {
          matches.push(str);
        }
      });
    
      cb(matches);
    };
    };
    
    var cities = [
      'Karachi',
      'Lahore',
      'Sialkot City',
      'Faisalabad',
      'Rawalpindi',
      'Peshawar',
      'Saidu Sharif',
      'Multan',
      'Gujranwala',
      'Islamabad',
      'Quetta',
      'Bahawalpur',
      'Sargodha',
      'New Mirpur',
      'Chiniot',
      'Sukkur',
      'Larkana',
      'Shekhupura',
      'Jhang City',
      'Rahimyar Khan',
      'Gujrat',
      'Kasur',
      'Mardan',
      'Mingaora',
      'Dera Ghazi Khan',
      'Nawabshah',
      'Sahiwal',
      'Mirpur Khas',
      'Okara'
  ]
    
    $('#theCities').typeahead({
    hint: true,
    highlight: true,
    minLength: 1
    },
    {
    name: 'cities',
    source: substringMatcher(cities)
    });

    /////////////////Datatable/////////////////
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

    /////////////////Page reload modal/////////////////
    $(document).ready(function() {
      if(window.location.href.indexOf('#addnew') != -1) {
        $('#addnew').modal('show');
      }
    });
         
    </script>