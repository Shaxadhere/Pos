<?php
include_once('../../config.php');
include_once('../../Models/Admin/CategoryModel.php');
getHeader("Category", "header.php");

$model = new CategoryModel();

$fetched = $model->List();


$error = "";

if (isset($_GET['error'])) {
  $error = $_GET['error'];
}

?>

<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-style1 mg-b-10">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category</li>
      </ol>
    </nav>
    <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
  </div>
</div>


<h5 id="section4" class="mg-b-10">Category</h5>


<?php

if (isset($_GET['Success'])) {
  $Success = $_GET['Success'];
}

if (!empty($Success)) {
  echo "<div class='alert alert-success' id='alert'>";
  echo "<button type='button' class='close' data-dismiss='alert'>x</button>";
  echo "<strong>Success! </strong> $Success";
  echo "</div>";
}

if (isset($_GET['Failure'])) {
  $Failure = $_GET['Failure'];
}

if (!empty($Failure)) {
  echo "<div class='alert alert-danger' id='alert'>";
  echo "<button type='button' class='close' data-dismiss='alert'>x</button>";
  echo "<strong>Failure! </strong> $Failure";
  echo "</div>";
}

?>

<a href="#addnew" data-toggle="modal" class="btn btn-sm btn-outline-primary">Add New Category</a>

<br><br>

<!--Table Starts-->
<div data-label="Example" class="df-example demo-table">
  <table id="table" class="table">
    <thead>
      <tr>
        <th class="wd-20p">Category Name</th>
        <th class="wd-10p"></th>

      </tr>
    </thead>
    <tbody>
      <?php

      while ($row = mysqli_fetch_array($fetched)) {
        echo "<tr>";
        echo "<td>" . $row['CategoryName'] . "</td>";
        echo "<td><button value='" . $row['PK_ID'] . "' class='btn btn-xs btn-outline-info editCategory'>Edit</button>&nbsp&nbsp&nbsp";
        echo "<button value='" . $row['PK_ID'] . "' class='btn btn-xs btn-outline-danger deleteCategory'>Delete</button></td>";
        echo "</tr>";
      }

      ?>
    </tbody>
  </table>
</div>

<!--Table End-->



<!--Add New Form Start-->

<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content tx-14">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel4">Add New Category</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form method="post" action="<?= $_HTMLROOTURI ?>/Models/Admin/Category.php" autocomplete="off">

          <?php

          if (isset($_GET['error'])) {
            $error = $_GET['error'];
          }

          if (!empty($error)) {
            echo "<span for='error' style='color:red'>$error</span>";
            echo "<br>";
          }

          ?>

          <div class="form-group">
            <label>Category Name</label>
            <input type="text" required="Category Name is Required" name="CategoryName" class="form-control" id="CategoryName" placeholder="Ali Sethi.. etc">
            <?php

            if (isset($_GET['CategoryName'])) {
              $CategoryName = $_GET['CategoryName'];
              echo "<span for='error' style='color:red;font-size: 12px;'>$CategoryName</span>";
            }

            ?>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
        <input name="addCategory" type="submit" class="btn btn-primary tx-13" value="Save">
        </form>
      </div>
    </div>
  </div>
</div>

<!--Add New Form Ends-->


<div id="modelForm"></div>

<?php
getFooter("footer.php");
?>

<?php

$alert = "";

if (isset($_GET['Success'])) {
  $alert = $_GET['Success'];
}

if (isset($_GET['Failure'])) {
  $alert = $_GET['Failure'];
}

if (!empty($alert)) {
  echo "<script>";
  echo "$(document).ready(function() {";
  echo "$('#alert').fadeTo(2000, 500).slideUp(500, function() {";
  echo "$('#alert').slideUp(500);";
  echo "});";
  echo "});";
  echo "</script>";
}

?>
<script>
  $(document).ready(function() {
    $(".editCategory").click(function() {
      // Get he content from the input box
      var uuid = this.value;
      $.ajax({
        type: "POST",
        url: "CategoryEdit?uuid=" + uuid,
        success: function(response) {
          $('#modelForm').empty();
          $('#modelForm').append(response);
        },
        error: function(e) {
          alert(e);
        }
      })
    });
  });

  $(document).ready(function() {
    $(".deleteCategory").click(function() {
      // Get he content from the input box
      var uuid = this.value;
      $.ajax({
        type: "POST",
        url: "CategoryDelete?uuid=" + uuid,
        success: function(response) {
          $('#modelForm').empty();
          $('#modelForm').append(response);
        },
        error: function(e) {
          alert(e);
        }
      })
    });
  });

  $(document).ready(function() {
    var table = $('#table').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'excel', 'pdf', 'print'
    ]
    });

    table.buttons().container()
      .insertBefore('#example_filter');
  });

  /////////////////Page reload modal/////////////////
  $(document).ready(function() {
    if (window.location.href.indexOf('#addnew') != -1) {
      $('#addnew').modal('show');
    }
  });
</script>