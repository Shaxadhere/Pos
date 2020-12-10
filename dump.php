<?php

include_once('config.php');
include_once('Models/PosModel.php');

$model = new POSModel();
$Customer = $model->fetchLastCustomer();
echo json_encode($Customer)

?>
