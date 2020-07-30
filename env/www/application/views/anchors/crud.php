<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>		
<div id="container">
	<h1><?php echo $title; ?></h1>

	<!-- breadcrumbs -->
	<div class="dbc">
		<p class='pbc'><a href="/" >Home</a> &gt;
			<?php
		 $tot = sizeof($bc);
		 $pos = 0;
		 foreach ($bc as $k) {
			$pos++;  
		 	?><a href="<?php echo $k->href ?>" ><?php echo $k->title; ?></a><?php 
		 	if($tot > $pos) { echo '&nbsp;&gt;&nbsp;';}
		} ?></p>
	</div>

	<div id="body">
		<div id="table"><?php echo $output; ?></div>
	</div>
	<p class="footer" >&nbsp;</p>
	
</div>

