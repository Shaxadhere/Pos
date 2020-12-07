<?php

include_once('../../config.php');
include_once('../../Models/Admin/ProductsModel.php');

$id = $_REQUEST['uuid'];

$model = new ProductModel();
$results = $model->View($id);
$product = mysqli_fetch_array($results);

echo "<li class='list-group-item d-flex align-items-center'>";
echo "<div class='row'>";
echo "<div class='col-md-6'>";

echo "<input type='hidden' class='productIds' value='".$product['PK_ID']."' name='productIds[]'>";

echo "<h6 class='tx-13 tx-inverse tx-semibold mg-b-0'>".$product['ProductName']."</h6>";
echo "<span class='d-block tx-11 text-muted'>Category / Company</span>";
echo "</div>";
echo "<div class='col-md-3 increase-decrease'>";
echo "<div class='row' style='font-size:16px'>";

echo   "<input class='form-control input-sm qtys' type='number' value='1' min='1' name='productQtys[]'/>";

echo "</div>";
echo "</div>";
echo "<div class='col-md-3'>";
echo "<span class='prices' style='padding:30px; font-size:15px' value='".$product['Price']."'>".$product['Price']."</span>";
echo "</div>";
echo "</div>";
echo "</li>";
