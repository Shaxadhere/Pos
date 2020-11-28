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
<div class="modal fade" id="editCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content tx-14">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Edit Customer Details</h6>
            <button type="button" class="close" data-dismiss="modal" onclick="window.location.reload()" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="<?= $_HTMLROOTURI ?>/Models/Admin/Customers.php" method="post">
              <input type="hidden" value="<?= $customer[0] ?>"/>
            <p class="mg-b-0"> <?= $customer[1] ?> </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal" onclick="window.location.reload()">Close</button>
            <input type="submit" name="editCustomer" class="btn btn-primary tx-13" value="Save Changes">
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#editCustomer').modal('show');
    });
    </script>