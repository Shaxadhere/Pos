<?php  
include_once('../../config.php');
getHeader("Dashboard", 'header.php');


?>

 <img src="<?php echo generateChart(200, 200, array(60,40), array("Profit", "Loss"), array("0168fa", "031d6b"), true);   ?>" />
            
<?php
getFooter('footer.php');
?>