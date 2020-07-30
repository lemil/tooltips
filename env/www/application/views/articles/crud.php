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



<script type="text/javascript">

$(document).ready(function() {

	ttips.init();
	
	$('img[data-type="tooltip"]').each( function(idx) {
		var articleid = $(this).data('articleid');
		//console.log('Tooltip articleid '+articleid);
		ttips.lookupArticle(articleid);		
	});


	//Only in add form
	if($('input#field-postId').length ){
		$('input#field-postId').blur(function(){
			var postId = $('input#field-postId').val();
			//console.log("lookupHelp "+ "index.php/manager/lookupHelp/"+postId);
			$.ajax({
				dataType: "json",
				url: "/articles/lookupHelp/"+postId,
				success: function(data) {
					//console.log(data.d.postId,data.d.image,data.d.title,data.d.text);
					$('input#field-url').val('http://help.embluemail.com/?p='+postId);
					$('input#field-image').val(data.d.image);
					$('input#field-title').val(data.d.title);
					$('input#field-text').val(data.d.text);					
				},
				error: function( jqXHR, textStatus, errorThrown ) {
					ttips.logXHRError(jqXHR, textStatus, errorThrown);
				}
			});	
		});
	}

 });


</script>
