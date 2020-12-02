<?php
include_once('../../config.php');
getHeader("Dashboard", 'header.php');


?>



<section class="main">
	 <form class="search" method="post" action="index.html" >
		 <input type="text" name="q" placeholder="Search..." class="form-control" />
		 <ul class="results" >
			 <li><a href="index.html">Search Result #1<br /><span>Description...</span></a></li>
			 <li><a href="index.html">Search Result #2<br /><span>Description...</span></a></li>
	 		<li><a href="index.html">Search Result #3<br /><span>Description...</span></a></li>
         	<li><a href="index.html">Search Result #4</a></li>
		 </ul>
	 </form>
</section>


<?php
getFooter('footer.php');
?>
