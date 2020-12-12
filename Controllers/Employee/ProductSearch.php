<?php

include_once('../../config.php');
include_once('../../Models/ProductSearch.php');

$input = $_REQUEST['input'];

$model = new ProductSearch();

$results = $model->getResults($input);

while ($row = mysqli_fetch_array($results)) {
    echo "<li class='searchresultitem'><a class='index0' onclick='check()' value='".$row['PK_ID']."' href='/'>".$row['ProductName']."<br /><span>PKR ".$row['Price']."</span></a></li>";
}



?>