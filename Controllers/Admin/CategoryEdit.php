<?php
include_once('../../config.php');
include_once('../../Models/Admin/CategoryModel.php');

$model = new CategoryModel();

if(isset($_GET['uuid'])){
    $uuid = $_GET['uuid'];
    $fetched = $model->View($uuid);
    $Category = mysqli_fetch_array($fetched);
}
?>
        <!--Add New Form Start-->

        <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content tx-14">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel4">Edit Category Details</h6>
            <button type="button" class="close" data-dismiss="modal" onclick="window.location.reload()" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">


          <form method="post" action="<?= $_HTMLROOTURI ?>/Models/Admin/Category.php" autocomplete="off">

          <?php
          
          if(isset($_GET['error'])){
            $error = $_GET['error'];
          }

          if(!empty($error)){
            echo "<span for='error' style='color:red'>$error</span>";
            echo "<br>";
          }
          
          ?>
          <input type="hidden" name="id" value="<?= $Category['PK_ID']?>">

           <div class="form-group">
          <label>Category Name</label>
          <input type="text" required="Category Name is Required" value="<?= $Category['CategoryName'] ?>" name="CategoryName" class="form-control" placeholder="Ali Sethi.. etc">
          <?php
          
          if(isset($_GET['CategoryName'])){
            $CategoryName = $_GET['CategoryName'];
            echo "<span for='error' style='color:red;font-size: 12px;'>$CategoryName</span>";
          }
          
          ?>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal" onclick="window.location.reload()">Close</button>
            <input name="editCategory" type="submit" class="btn btn-primary tx-13" value="Save Changes" />
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