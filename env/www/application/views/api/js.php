<?php
header("Content-type: application/x-javascript");

$isdebug  = "true";

?>
$(document).ready(function() {
	ttips.init(<?php echo $isdebug; ?>);
<?php 

	if(isset($consolelog)) {
echo '	console.log("'.$consolelog.'");';
	}

	foreach ($anchors as $anchor) {
	
?>	if ($('<?php echo $anchor['selector']; ?>').length ) {
		$('<?php echo $anchor['selector']; ?>').each( function(idx) {
			ttipImage  = "<img src='http://localhost/assets/icon/help.png' ";
			ttipImage += " style='height:14px;width:14px;position: relative;left: 5px;top:0px;' ";
			ttipImage += " data-articleid='<?php echo  $anchor['id']; ?>' data-type='tooltip'>";
			outerHtml = $('<?php echo  $anchor['selector']; ?>').html()+ttipImage;
			$('<?php echo  $anchor['selector']; ?>').html(outerHtml);
			ttips.lookupArticle(<?php echo $anchor['id']; ?>);	
		});
	}
	<?php 
	}
?>

});