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


function generateTokenButton(){
	s  = '&nbsp;&nbsp;&nbsp;';
	s += '<a  id="btnGenerateToken" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">';
	s += '<span class="ui-button-icon-primary ui-icon ui-icon-key Dce0d693e"></span><span class="ui-button-text">&nbsp;Generate Token</span>';
	s += '</a>';
	return s;
}

function generateToken() {
	var username = $('input#field-username').val();
	$.ajax({
		dataType: "json",
		url: "/api/generateUserToken/"+username,
		success: function(data) {
			console.log('success');
			var s = '';
			if(data.d == "false") {

			} else {
				$('input#field-token').val(data.d);
			}
		},
		error: function( jqXHR, textStatus, errorThrown ) {
			console.log('error');
			ttips.logXHRError(jqXHR, textStatus, errorThrown);
		}
	});	
}


$(document).ready(function() {
	//Only in add form
	if($('input#field-token').length > 0){
		
		$('input#field-token').after(function(){
			return generateTokenButton();
		});

		$('#btnGenerateToken').click( function() {
			generateToken();
		});

		$('input#field-username').blur(function(){
			if($('input#field-token').val().length == 0){
				generateToken();
			}
		});

	}

 });


</script>
