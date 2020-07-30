<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div id="container" style=" height: 90%">
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


		<div class="menu-row" >Data Model Tables</div>

		<code>

		<?php 
		foreach ($tables as $t ) { 
			if(substr($t,0,1) == '<') { echo $t; } else { ?>
		<a href="browse/table/<?php echo $t ?>" target="<?php echo $t ?>"><?php echo ucwords($t) ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<?php } } ?>

		</code>

	</div>

	<p class="footer" > &nbsp;</p>

</div>