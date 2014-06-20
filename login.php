<?php
session_start();
 
if (!empty($_SESSION['username'])) {
        header('location:index.php');
}

	include ("lib/adodb/adodb.inc.php");
	include ("lang/indonesia.php");
	include ("config.php");
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
	<title>Login</title>
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
	
</head>
 
<body>
<form name="login" action="auth.php" method="post">
 
<div class="container">

	<div class="sixteen columns">
		&nbsp;
	</div>
	
	<div class="one-third column">
	&nbsp;
<?php
//kode php ini kita gunakan untuk menampilkan pesan eror
if (!empty($_GET['error'])) {
    if ($_GET['error'] == 1) {
        echo '<h5 style="color:red; text-align:center;">Username dan Password belum diisi!</h5>';
    } else if ($_GET['error'] == 2) {
        echo '<h5 style="color:red; text-align:center;">Username belum diisi!</h5>';
    } else if ($_GET['error'] == 3) {
        echo '<h5 style="color:red; text-align:center;">Password belum diisi!</h5>';
    } else if ($_GET['error'] == 4) {
        echo '<h5 style="color:red; text-align:center;">Username atau Password tidak terdaftar!</h5>';
    }
}
?>
	</div>
	<div class="one-third column">
		<div class="">
			<ul data-role="listview" data-inset="true">
				<li class="ui-field-contain">
					<input type="text" name="username" id="username" value="Username" data-clear-btn="true">
				</li>
				<li class="ui-field-contain">
					<input type="password" name="password" id="password" value="Password" data-clear-btn="true">
				</li>
				<li class="ui-body ui-body-b">
					<fieldset class="ui-grid-a">
						<div class="ui-block-b"><button type="submit" class="ui-btn ui-corner-all ui-btn-a">Login</button></div>
					</fieldset>
				</li>
			</ul>
		</div>
	</div>
	<div class="one-third column">
		&nbsp;
	</div>
	
	<div class="sixteen columns">
		<br />
		<center>Yesweb-A.CIQ Platform</center>
		<br />
	</div>
</div>
</form>
</body>
</html>