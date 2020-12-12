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
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content tx-14">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Customer Details</h6>
            <button type="button" class="close" data-dismiss="modal" onclick="window.location.reload()" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card">
              <div class="card-header"><strong><?= $customer[1] ?></strong></div>
              <div class="card-body">
                <div class="row">
                  <?php
                  
                  if(!empty($customer['Email'])){
                    echo "<div class='col-md-6'>";
                    echo "<h6>Email:</h6>";
                    echo "<p>";
                    echo $customer['Email'];
                    echo "</p>";
                    echo "</div>";
                  }
                  
                  if(!empty($customer['Mobile'])){
                    echo "<div class='col-md-6'>";
                    echo "<h6>Mobile:</h6>";
                    echo "<p>";
                    echo $customer['Mobile'];
                    echo "</p>";
                    echo "</div>";
                  }

                  if(!empty($customer['Address'])){
                    echo "<div class='col-md-12'>";
                    echo "<h6>Address:</h6>";
                    echo "<p>";
                    echo $customer['Address'];
                    echo "</p>";
                    echo "</div>";
                  }

                  if(!empty($customer['PostalCode'])){
                    echo "<div class='col-md-6'>";
                    echo "<h6>PostalCode:</h6>";
                    echo "<p>";
                    echo $customer['PostalCode'];
                    echo "</p>";
                    echo "</div>";
                  }


                  if(!empty($customer['Landmark'])){
                    echo "<div class='col-md-6'>";
                    echo "<h6>Landmark:</h6>";
                    echo "<p>";
                    echo $customer['Landmark'];
                    echo "</p>";
                    echo "</div>";
                  }


                  if(!empty($customer['City'])){
                    echo "<div class='col-md-6'>";
                    echo "<h6>City:</h6>";
                    echo "<p>";
                    echo $customer['City'];
                    echo "</p>";
                    echo "</div>";
                  }


                  if(!empty($customer['Province'])){
                    echo "<div class='col-md-6'>";
                    echo "<h6>State:</h6>";
                    echo "<p>";
                    echo $customer['Province'];
                    echo "</p>";
                    echo "</div>";
                  }
                  

                  if(!empty($customer['Phone'])){
                    echo "<div class='col-md-6'>";
                    echo "<h6>Phone:</h6>";
                    echo "<p>";
                    echo $customer['Phone'];
                    echo "</p>";
                    echo "</div>";
                  }


                  if(!empty($customer['Fax'])){
                    echo "<div class='col-md-6'>";
                    echo "<h6>Fax:</h6>";
                    echo "<p>";
                    echo $customer['Fax'];
                    echo "</p>";
                    echo "</div>";
                  }

                  if(!empty($customer['Note'])){
                    echo "<div class='col-md-12'>";
                    echo "<h6>Note:</h6>";
                    echo "<p>";
                    echo $customer['Note'];
                    echo "</p>";
                    echo "</div>";
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnDelete" value="<?= $customer[0] ?>" class="btn btn-danger tx-13" data-dismiss="modal">Delete</button>
            <button type="button" id="btnEdit" value="<?= $customer[0] ?>" class="btn btn-primary tx-13 editCustomer">Edit</button>
          </div>
        </div>
      </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#viewDetails').modal('show');
    });

    $(document).ready(function () {
      $("#btnEdit").click(function () {
        $('#viewDetails').modal('toggle');
        $('#viewDetails').modal().remove()
        // Get he content from the input box
        var uuid = this.value;
        $.ajax({
          type: "POST",
          url: "CustomerEdit?uuid="+uuid,
          success: function (response) {
            $('#modelForm').empty();
            $('#modelForm').append(response);
          },
          error: function (e) {
            alert(e); 
          }
        })
      });
    });

    $(document).ready(function () {
      $("#btnDelete").click(function () {
        $('#viewDetails').modal('hide');
        // Get he content from the input box
        var uuid = this.value;
        $.ajax({
          type: "POST",
          url: "CustomerDelete?uuid="+uuid,
          success: function (response) {
            $('#modelForm').empty();
            $('#modelForm').append(response);
          },
          error: function (e) {
            alert(e); 
          }
        })
      });
    });
    </script>