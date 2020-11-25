<?php
include_once('../../config.php');

if(isset($_REQUEST['uuid'])){


    $uuid = $_REQUEST['uuid'];


}
else{
    http_response_code(400);
}

?>

<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content tx-14">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel4">Product Details</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Delete</button>
            <a name="addProduct" class="btn btn-primary tx-13">Edit</a>
          </div>
        </div>
      </div>
    </div>


    <script>
     $(document).ready(function() {
        $('#viewDetails').modal('show');
      });
    </script>