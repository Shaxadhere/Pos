<?php

include_once('../../config.php');
include_once('../../Models/ProductSearch.php');

$input = $_REQUEST['input'];

$model = new ProductSearch();

$results = $model->getResults($input);

while ($row = mysqli_fetch_array($results)) {
    if($row['deleted'] == 0){
     
    echo "<li class='searchresultitem'>".
        "<div class='single-prod-detail'>".
        "<a class='index0' onclick='check()' value='".$row['PK_ID']."' href='/'>".
        "<div class='pro-name-pri'>".$row['ProductName']."<br><span>PKR ".$row['Price']."</span></div>".
        "<div class='prod-qty'>QTY<br><span>".$row['Quantity']."</span></div>".
        "<div class='prod-code-pri'>Product Code<br><span>g6568mf</span></div>".
        "</a>".
        "</div>".
        "</li> ";
           
    }
    // echo "<li class='searchresultitem'><a class='index0' onclick='check()' value='".$row['PK_ID']."' href='/'>".$row['ProductName']."<br /><span>PKR ".$row['Price']."</span></a></li>";
}



?>
