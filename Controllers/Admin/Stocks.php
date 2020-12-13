<?php
include_once('../../config.php');
include_once('../../Models/Admin/StocksModel.php');
getHeader("Stocks", "header.php");

$model = new StockModel();

$fetched = $model->ListStocksWithProduct();


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
        <li class="breadcrumb-item active" aria-current="page">Stocks</li>
      </ol>
    </nav>
    <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
  </div>
</div>


<h5 id="section4" class="mg-b-10">Manage Stocks</h5>


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

<a href="Products" class="btn btn-sm btn-outline-primary">Add New Product</a>

<br><br>

<!--Table Starts-->
<div data-label="Example" class="df-example demo-table">
  <table id="table" class="table">
    <thead>
      <tr>
        <th class="wd-20p">Product Code</th>
        <th class="wd-25p">Product Name</th>
        <th class="wd-10p">Price</th>
        <th class="wd-10p">Quantity</th>
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
        echo "<td>" . $row['Quantity'] . "</td>";
        echo "<td><button value='" . $row['PK_ID'] . "' class='btn btn-xs btn-outline-info editStock'>View</button></td>";
        echo "</tr>";
      }

      ?>
    </tbody>
  </table>
</div>

<!--Table End-->


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
    $(".editStock").click(function() {
      // Get he content from the input box
      var uuid = this.value;
      $.ajax({
        type: "POST",
        url: "StockEdit?uuid=" + uuid,
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