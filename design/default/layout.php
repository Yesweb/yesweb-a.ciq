<?php
ob_start();
$usern = $_SESSION['username'];
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Yesweb-A.CIQ Platform</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="design/<?= $_CONFIG['templ']['main']; ?>/stylesheets/base.css">
	<link rel="stylesheet" href="design/<?= $_CONFIG['templ']['main']; ?>/stylesheets/skeleton.css">
	<link rel="stylesheet" href="design/<?= $_CONFIG['templ']['main']; ?>/stylesheets/layout.css">
	<link rel="stylesheet" href="design/<?= $_CONFIG['templ']['main']; ?>/stylesheets/style.css">

	<!-- jQuery -->
	<link rel="stylesheet" href="design/<?= $_CONFIG['templ']['main']; ?>/js/jquery.mobile-1.4.0.min.css" />
	<script src="design/<?= $_CONFIG['templ']['main']; ?>/js/jquery-1.9.1.min.js"></script>
	<script src="design/<?= $_CONFIG['templ']['main']; ?>/js/jquery.mobile-1.4.0.min.js"></script>
		<!-- jQuery Date Picker -->
		<link rel="stylesheet" href="design/<?= $_CONFIG['templ']['main']; ?>/js/jquery.mobile.datepicker.css" />
		<script src="design/<?= $_CONFIG['templ']['main']; ?>/js/jquery.ui.datepicker.js"></script>
		<script src="design/<?= $_CONFIG['templ']['main']; ?>/js/jquery.mobile.datepicker.js"></script>
		<!-- jQuery Date Picker -->
	<!-- jQuery -->
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="design/<?= $_CONFIG['templ']['main']; ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="design/<?= $_CONFIG['templ']['main']; ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="design/<?= $_CONFIG['templ']['main']; ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="design/<?= $_CONFIG['templ']['main']; ?>/images/apple-touch-icon-114x114.png">

	
</head>
<body>

	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
		<div class="sixteen columns skeleton">
			<img src="uploads/header_14.jpg" class="scale-with-grid">
		</div>
		<div class="eleven columns">
		
			<?php include ("design/".$_CONFIG['templ']['main']."/switching.php"); ?>

		</div>
		<div class="five columns margintop08">
		
			<?php include ("design/".$_CONFIG['templ']['main']."/menu.php"); ?>

		</div>
		<div class="sixteen columns">
			<hr class="half-bottom" />
			<h5>Version 1.2</h5>
		</div>

	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>
