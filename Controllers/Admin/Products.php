<?php
include_once('../../config.php');
include_once('../../Models/Admin/ProductsModel.php');
include_once('../../Models/Admin/CategoryModel.php');
include_once('../../Models/Admin/CompanyModel.php');
getHeader("Products", "header.php");

$model = new ProductModel();
$categoryModel = new CategoryModel();
$companyModel = new CompanyModel();

$fetched = $model->List();
$category = $categoryModel->List();
$company = $companyModel->List();


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
        <li class="breadcrumb-item active" aria-current="page">Products</li>
      </ol>
    </nav>
    <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
  </div>
</div>


<h5 id="section4" class="mg-b-10">Products</h5>


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

<a href="#addnew" data-toggle="modal" class="btn btn-sm btn-outline-primary">Add New Product</a>

<br><br>

<!--Table Starts-->
<div data-label="Example" class="df-example demo-table">
  <table id="table" class="table">
    <thead>
      <tr>
        <th class="wd-10p">Product Code</th>
        <th class="wd-25p">Product Name</th>
        <th class="wd-10p">Price</th>
        <th class="wd-10p"></th>

      </tr>
    </thead>
    <tbody>
      <?php

      while ($row = mysqli_fetch_array($fetched)) {
        echo "<tr>";
        echo "<td>" . $row['ProductCode'] . "</td>";
        echo "<td>" . $row['ProductName'] . "</td>";
        echo "<td>" . $row['Price'] . "</td>";
        echo "<td><button value='" . $row['PK_ID'] . "' class='btn btn-xs btn-outline-info viewProduct'>View</button></td>";
        echo "</tr>";
      }

      ?>
    </tbody>
  </table>
</div>

<!--Table End-->



<!--Add New Form Start-->

<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content tx-14">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel4">Add New Product</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form method="post" action="<?= $_HTMLROOTURI ?>/Models/Admin/Products.php" autocomplete="off">

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
            <label>Product Name</label>
            <input type="text" required="Product Name is Required" name="ProductName" class="form-control" id="ProductName" placeholder="iPhone, Tea, Sweatshirt.. etc">
            <?php

            if (isset($_GET['ProductName'])) {
              $ProductName = $_GET['ProductName'];
              echo "<span for='error' style='color:red;font-size: 12px;'>$ProductName</span>";
            }

            ?>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">Price</label><br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">PKR</span>
                </div>
                <input type="text" name="Price" class="form-control" aria-label="Amount (to the nearest rupee)">
              </div>
              <?php

              if (isset($_GET['Price'])) {
                $Price = $_GET['Price'];
                echo "<span for='error' style='color:red;font-size: 12px;'>$Price</span>";
              }

              ?>
            </div>
            <div class="form-group col-md-4">
              <label for="select-category">Category</label><br>
              <select class="custom-select" name="FK_Category">
                <option selected value="8">Select Category</option>
                <?php

                while ($row = mysqli_fetch_array($category)) {
                  echo "<option value=" . $row['PK_ID'] . ">" . $row['CategoryName'] . "</option>";
                  echo "<td>" . $row['ProductCode'] . "</td>";
                }

                ?>
              </select>
              <?php

              if (isset($_GET['FK_Category'])) {
                $FK_Category = $_GET['FK_Category'];
                echo "<span for='error' style='color:red;font-size: 12px;'>$FK_Category</span>";
              }

              ?>
            </div>
            <div class="form-group col-md-4">
              <label for="inputEmail4">Company</label><br>
              <select class="custom-select" name="FK_Company">
                <option selected value="5">Select Company</option>
                <?php

                while ($row = mysqli_fetch_array($company)) {
                  echo "<option value=" . $row['PK_ID'] . ">" . $row['CompanyName'] . "</option>";
                }

                ?>
              </select>
              <?php

              if (isset($_GET['FK_Company'])) {
                $FK_Company = $_GET['FK_Company'];
                echo "<span for='error' style='color:red;font-size: 12px;'>$FK_Company</span>";
              }

              ?>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="inputEmail4">Features</label>
                <input type="text" name="Features" class="form-control" placeholder="Write features if any..">
                <?php

                if (isset($_GET['Features'])) {
                  $Features = $_GET['Features'];
                  echo "<span for='error' style='color:red;font-size: 12px;'>$Features</span>";
                }


                ?>
              </div>
              <div class="form-row">
                <div class="col-md-12">
                  <div class="custom-file">
                    <input type="file" name="Image" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <?php

                  if (isset($_GET['Image'])) {
                    $Image = $_GET['Image'];
                    echo "<span for='error' style='color:red;font-size: 12px;'>$Image</span>";
                  }

                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
            <input name="addProduct" type="submit" class="btn btn-primary tx-13" value="Save">
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
    $(".viewProduct").click(function() {
      // Get he content from the input box
      var uuid = this.value;
      $.ajax({
        type: "POST",
        url: "ProductView?uuid=" + uuid,
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
  }, {
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
  }, {
    name: 'cities',
    source: substringMatcher(cities)
  });

  /////////////////Datatable/////////////////
  $(document).ready(function() {
    var table = $('#table').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'excel', 'pdf', 'print', 'colvis'
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