<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $table; ?></title>


	<link href="https://unpkg.com/tabulator-tables@4.0.5/dist/css/tabulator.min.css" rel="stylesheet">
	<script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.0.5/dist/js/tabulator.min.js"></script>

	<!-- Jquery -->
	<script
		  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
		  crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="/assets/css/base.css" />

	<style type="text/css">

	#table {
		position: absolute;
		display: block;
	    bottom: 0px;
	    top: 0px;
	    height: auto;
	    width: auto;
	    left: 0px;
	    right: 0px;
	}
	</style>
</head>
<body scroll="no" style="overflow-y: hidden;" >
	<div id="table">

		<script>
			var table = new Tabulator("#table", {
			    height:"100%",
			    columns: 
			    [ <?php 
			    $ks = array_keys($rows[0]);
			    foreach ($ks as $k) { ?> {title:"<?php echo $k ?>", field:"<?php echo $k ?>"},
			    <?php } ?>
			    ],
			    data: <?php echo json_encode($rows) ?>,
			});
1111
		</script>
</body>
</html>