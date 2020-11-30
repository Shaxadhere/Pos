<?php
include_once('../../config.php');
include_once('../../Models/Admin/CompanyModel.php');

$model = new CompanyModel();

if(isset($_GET['uuid'])){
    $uuid = $_GET['uuid'];
    $fetched = $model->View($uuid);
    $Company = mysqli_fetch_array($fetched);
}
?>
        <!--Add New Form Start-->

        <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content tx-14">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel4">Edit Company Details</h6>
            <button type="button" class="close" data-dismiss="modal" onclick="window.location.reload()" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">


          <form method="post" action="<?= $_HTMLROOTURI ?>/Models/Admin/Company.php" autocomplete="off">

          <?php
          
          if(isset($_GET['error'])){
            $error = $_GET['error'];
          }

          if(!empty($error)){
            echo "<span for='error' style='color:red'>$error</span>";
            echo "<br>";
          }
          
          ?>
          <input type="hidden" name="id" value="<?= $Company['PK_ID']?>">

           <div class="form-group">
          <label>Company Name</label>
          <input type="text" required="Company Name is Required" value="<?= $Company['CompanyName'] ?>" name="CompanyName" class="form-control" placeholder="Ali Sethi.. etc">
          <?php
          
          if(isset($_GET['CompanyName'])){
            $CompanyName = $_GET['CompanyName'];
            echo "<span for='error' style='color:red;font-size: 12px;'>$CompanyName</span>";
          }
          
          ?>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal" onclick="window.location.reload()">Close</button>
            <input name="editCompany" type="submit" class="btn btn-primary tx-13" value="Save Changes" />
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