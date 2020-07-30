<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to TTHelp</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="/assets/css/base.css" />

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">


	<!-- Jquery -->
	<script src="/assets/js/jquery/jquery-3.3.1.min.js"></script>

	<!-- Base -->
	<script src="/assets/js/base.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- Tippy -->
	<script src="https://unpkg.com/tippy.js@4"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

	<!-- bootstrap treeview-->
	<link rel="stylesheet" href="/assets/js/treeview/bootstrap-treeview.min.css" />
	<script src="/assets/js/treeview/bootstrap-treeview.min.js"></script>

	<!-- jsTree -->
	<link rel="stylesheet" href="/assets/js/jstree/themes/default/style.min.css" />
	<script src="/assets/js/jstree/jstree.min.js"></script>


	<!-- Ttips -->
	<link rel="stylesheet" href="/assets/js/ttips/ttips.css" />
	<script src="/assets/js/ttips/ttips.js"></script>

	

<?php foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>	

	<!-- Jquery -->
	<link rel="stylesheet" type="text/css" href="/assets/css/base.css" />


	<!-- CRUD Cusmto CSS -->
	<link rel="stylesheet" href="/assets/css/crud.css" />


<?php if($include_menu) { ?>
	<!-- Mnu Menu -->
	<link rel="stylesheet" href="/assets/js/mnu/mnu.css" />
	<script src="/assets/js/mnu/mnu.js"></script>
<?php } ?>

</head>
<body scroll="no" style="overflow-y: hidden;" >

