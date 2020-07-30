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


		<div class="menu-row" >User Management</div>

		<code>
		<br>

		<ul>

		<li><a href="users/manager" target="_self">User Manager</a></li>

		</ul>

		</code>

	</div>

	<p class="footer" > &nbsp;</p>

</div>