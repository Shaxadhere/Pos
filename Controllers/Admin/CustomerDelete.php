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
<div class="modal fade" id="deleteData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content tx-14">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel5">Modal Title</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="mg-b-0">Are you sure you want to delete <strong><?= $customer['CustomerName'] ?></strong></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary tx-13" data-dismiss="modal" onclick="window.location.reload()">No</button>
            <form method="post" action="<?= $_HTMLROOTURI ?>/Models/Admin/Customers.php" >
                <input type="hidden" name="id" value="<?= $customer['PK_ID'] ?>">
                <input type="submit" name="deleteCustomer" class="btn btn-danger tx-13" value="Yes" />
            </form>
          </div>
        </div>
      </div>
    </div>

        

    <script>
    $(document).ready(function() {
        $('#deleteData').modal('show');
    });
    </script>