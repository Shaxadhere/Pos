<?php
include_once('../../config.php');

if(isset($_GET['uuid'])){
    $uuid = $_GET['uuid'];
    $fetched = fetchDataById(
        "tbl_customer",
        "PK_ID",
        $uuid,
        connect()
    );
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
            <p class="mg-b-0"> <?= $customer[1] ?> </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal" onclick="window.location.reload()">Close</button>
            <button type="button" id="btnEdit" class="btn btn-primary tx-13 editCustomer">Edit</button>
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
        $('#viewDetails').modal('hide');
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
    </script>