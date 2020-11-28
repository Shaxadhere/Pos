<?php
include_once('../../config.php');
include_once('../../Models/Admin/CustomersModel.php');

$model = new CustomersModel();

if(isset($_GET['uuid'])){
    $uuid = $_GET['uuid'];
    $fetched = $model->View($uuid);
    $customer = mysqli_fetch_array($fetched);
}
?>
        <!--Add New Form Start-->

        <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content tx-14">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel4">Edit Customer Details</h6>
            <button type="button" class="close" data-dismiss="modal" onclick="window.location.reload()" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">


          <form method="post" action="<?= $_HTMLROOTURI ?>/Models/Admin/Customers.php" autocomplete="off">

          <?php
          
          if(isset($_GET['error'])){
            $error = $_GET['error'];
          }

          if(!empty($error)){
            echo "<span for='error' style='color:red'>$error</span>";
            echo "<br>";
          }
          
          ?>
          <input type="hidden" name="id" value="<?= $customer['PK_ID']?>">

           <div class="form-group">
          <label>Customer Name</label>
          <input type="text" required="Customer Name is Required" value="<?= $customer['CustomerName'] ?>" name="CustomerName" class="form-control" placeholder="Ali Sethi.. etc">
          <?php
          
          if(isset($_GET['CustomerName'])){
            $CustomerName = $_GET['CustomerName'];
            echo "<span for='error' style='color:red;font-size: 12px;'>$CustomerName</span>";
          }
          
          ?>
        </div>

          
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Address</label>
            <input type="text" required="Address is required" value="<?= $customer['Address'] ?>" name="Address" class="form-control" placeholder="Suite, Apt..etc">
            <?php
          
            if(isset($_GET['Address'])){
              $Address = $_GET['Address'];
              echo "<span for='error' style='color:red;font-size: 12px;'>$Address</span>";
            }
          
          ?>
          </div>
        </div>

        <div class="form-row">
           <div class="form-group col-md-3">
            <label for="inputEmail4">State</label><br>
            <input id="thetheStates" type="text" value="<?= $customer['Province'] ?>" required="State is required" name="State" class="form-control" placeholder="State">
            <?php
          
            if(isset($_GET['State'])){
              $State = $_GET['State'];
              echo "<span for='error' style='color:red;font-size: 12px;'>$State</span>";
            }
          
          ?>
          </div>
          <div class="form-group col-md-3">
            <label for="inputEmail4">City</label><br>
            <input id="thetheCities" type="text" value="<?= $customer['City'] ?>" required="City is required" name="City" class="form-control" placeholder="City">
            <?php
          
            if(isset($_GET['City'])){
              $City = $_GET['City'];
              echo "<span for='error' style='color:red;font-size: 12px;'>$City</span>";
            }
          
          ?>
          </div>
          <div class="form-group col-md-3">
            <label for="inputEmail4">Postal Code</label><br>
            <input type="text" value="<?= $customer['PostalCode'] ?>" required="Postal Code is required" name="PostalCode" class="form-control" placeholder="PostalCode">
            <?php
          
            if(isset($_GET['PostalCode'])){
              $PostalCode = $_GET['PostalCode'];
              echo "<span for='error' style='color:red;font-size: 12px;'>$PostalCode</span>";
            }
          
          ?>
          </div>
          <div class="form-group col-md-3">
            <label for="inputEmail4">Landmark</label><br>
            <input type="text" value="<?= $customer['Landmark'] ?>" name="Landmark" class="form-control" placeholder="Landmark">
          </div>
          </div>

          <div class="form-row">
           <div class="form-group col-md-4">
            <label for="inputEmail4">Email</label>
            <input type="email" name="Email"  value="<?= $customer['Email'] ?>" class="form-control" placeholder="abc@example.com">
            <?php
          
            if(isset($_GET['Email'])){
              $Email = $_GET['Email'];
              echo "<span for='error' style='color:red;font-size: 12px;'>$Email</span>";
            }
          
          ?>
          </div>
          <div class="form-group col-md-4">
            <label for="inputPassword4">Mobile</label>
            <input type="phone" value="<?= $customer['Mobile'] ?>" required="Mobile is required" name="Mobile" class="form-control" placeholder="Mobile number">
            <?php
          
            if(isset($_GET['Mobile'])){
              $Mobile = $_GET['Mobile'];
              echo "<span for='error' style='color:red;font-size: 12px;'>$Mobile</span>";
            }
          
          ?>
          </div>
          <div class="form-group col-md-4">
            <label for="inputPassword4">Phone</label>
            <input type="phone" value="<?= $customer['Phone'] ?>" name="Phone" class="form-control" placeholder="Phone number">
          </div>
          </div>

          <div class="form-group">
          <label for="inputAddress">Fax</label>
          <input type="text" name="Fax" value="<?= $customer['Fax'] ?>" class="form-control" id="Fax" placeholder="Fax number">
          </div>

          <div class="form-group">
          <label for="inputAddress">Note</label>
          <input type="text" name="Note" value="<?= $customer['Note'] ?>" class="form-control" id="Note" placeholder="Any notes..">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal" onclick="window.location.reload()">Close</button>
            <input name="editCustomer" type="submit" class="btn btn-primary tx-13" value="Save Changes" />
            </form>
          </div>
        </div>
      </div>
    </div>

    <!--Add New Form Ends-->
    

    <script>
    $(document).ready(function() {
        $('#editData').modal('show');
    });
    </script>