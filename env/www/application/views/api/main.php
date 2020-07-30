<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div id="container" style=" height: 90%">
<script src="http://localhost/assets/js/jquery/jquery-3.3.1.min.js"></script> 
<link rel="stylesheet" href="http://localhost/assets/js/ttips/ttips.css"> 
<script src="http://localhost/assets/js/ttips/ttips.js"></script>
	<h1>Using the TTIP Framework (<?php echo $title; ?>)</h1>

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


		<div class="menu-row" >Quickstart</div>
		<br>
		<p>
			There are two ways to integrate this frameword to your webstite. 
			<ul>
			<li><a href="#one">DOM injected "help icons"</li>
			<li><a href="#two">Manual Insertion</a></li>
			</ul>

		</p>
		<br>

		<div class="menu-row" ><a name="one">DOM injected "help icons"</a></div>
		<br>
		<p>
			<b>Step 1</b> # Include these tags at the top (header) of your page.
		</p>
		<code>
				<i style="color:blue">
				&lt;script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/jquery/jquery-3.3.1.min.js"&gt;&lt;/script&gt;
				<br>
				&lt;link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/ttips/ttips.css"&gt;
				<br>
				&lt;script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/ttips/ttips.js"&gt;&lt;/script&gt;
				<br>
				&lt;script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/ttips/ttips.js"&gt;&lt;/script&gt;

				</i>
		</code>
		<br>

		<p>
			<b>Step 2</b> # Configure Locations, Articles and Anchors
		</p>

		<code>

			a. <a style="color:blue" href="http://localhost/locations/manager">Locations</a> : add a hostname and page/query name
			<br>
			b. <a style="color:blue" href="http://localhost/articles/manager">Articles</a> : add articles from WP post
			<br>
			c. <a style="color:blue" href="http://localhost/anchors/manager">Anchors</a> : link DOM Selectors from one Location to an Article

		</code>
		<br>



		<p>
			<b>Step 3</b> # Configure Articles and place "help tags"
		</p>

		<code>
			<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/api/js/"></script>
		</code>
		<br>


		<p>
			<b>Step 4</b> # Test and edit "help icons" placement
		</p>

		<code>

			a. Test your website
			<br>
			b. <a style="color:blue" href="http://localhost/anchors/manager">Anchors</a> : Edit "help icons" placement with CSS (Style and Clases)

		</code>
		<br><br><br>



		<!-- Section #2 -->

		<div class="menu-row" ><a name="two">Manual Insertion</a></div>
		<br>
		<p>
			<b>Step 1</b># Include these tags at the top (header) of your page.
		</p>
		<code>
				<i style="color:blue">
				&lt;script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/jquery/jquery-3.3.1.min.js"&gt;&lt;/script&gt;
				<br>
				&lt;link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/ttips/ttips.css"&gt;
				<br>
				&lt;script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/assets/js/ttips/ttips.js"&gt;&lt;/script&gt;
				</i>

		</code>
		<br>

		<p>
			<b>Step 2</b> # Configure Articles and place "help tags"
		</p>

		<code>

			a. <a href="http://localhost/articles/manager">Articles</a> : add articles from WP post
			<br>
			b. Manually insert the HTML code changing "data" properties like this, 
			<br>
			<ul>
				<li><b>data-articleid</b>: Article Id number created in the previous step</li>
				<li><b>data-type</b> : Tooltip Type. By now, just use "tooltip"</li>
			</ul>
			Example: <br>
			Code: <i style="color:blue">&lt;img src="/assets/icon/help.png" height="14px" width="14px" data-articleid="54" data-type="tooltip"&gt;</i>
			<br>
			HTML : <img src="/assets/icon/help.png" style="height:14px;width:14px" data-articleid="54" data-type="tooltip"> Haz Click!
		</code>
		<br>


		<p>
			<b>Step 3</b> # Configure Articles and place "help tags"
		</p>

		<code>
<span >&lt;script type="text/javascript"&gt;<br></span>
&nbsp;&nbsp;&nbsp;&nbsp;$(document).ready(function() {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ttips.init();<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$('img[data-type="tooltip"]').each( function(idx) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var articleid = $(this).data('articleid');<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ttips.lookupArticle(articleid);<br>
&nbsp;&nbsp;&nbsp;&nbsp;});<br>
<span >&lt;/script&gt;<br></span>

		</code>
		<br>

		<p>
			<b>Step 4</b> # Test and edit "help icons" placement
		</p>

		<code>
			a. Test your website
			<br>
			b. Edit "help icons" placement with CSS (Style and Clases) in your own HTML
		</code>
		<br>

	</div>

	<p class="footer" > &nbsp;</p>

</div>

<script type="text/javascript">

$(document).ready(function() {

	ttips.init();
	
	$('img[data-type="tooltip"]').each( function(idx) {
		var articleid = $(this).data('articleid');
		ttips.lookupArticle(articleid);		
	});
});


</script>
