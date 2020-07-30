<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div id="container">
	<h1 style="background-image:none;padding: 14px 15px 10px 23px;"><img width="100" src="/assets/icon/logo_ttips.png"></h1>

	<div id="body">

		<?php 
		//var_dump($tables);
		foreach ($tables as $t ) {
			$l = $t->href;
			$f = $t->target;
			$e = $t->title;
			$i = $t->icon;

			if($t->type == 'row') { 
				echo '<div class="menu-row" ><img class="menu-row-img"  width="18" src="'; 
				echo str_replace('.png','_black.png',$i).'" >&nbsp;&nbsp;'.$e.'</div>'; 
			} 
			if($t->type == 'item') { 	?>
			<a href="<?php echo $l ?>" target="<?php echo $f ?>">
			<div class="mnu-button-container">
				<div class="mnu-button">
					<img width="18" src="<?php echo $i ?>" >
				</div>
				<div class="menu" ><?php echo $e ?></div>
			</div></a>
		<?php } } ?>
	</div>

	<p class="footer" > &nbsp;</p>
	
</div>
