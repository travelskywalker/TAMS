<?php
require_once 'library/config.php';
require_once 'library/functions.php';
?>
<html lang="en">

<head>

<!--css-->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />


<script src="/tams/javascripts/jquery.js"></script>


<script src="/tams/javascripts/clock.js"></script>
<script src="/tams/bootstrap/js/bootstrap.min.js"></script>
<script src="/tams/javascripts/edit.js"></script>
<script src="/tams/javascripts/intgeronly.js"></script>

<!--CDN for Navbar-->
<script src="/tams/javascripts/popper.js"></script>

 <!-- Isotope JS -->
<script src="/tams/javascripts/imagesloaded.pkgd.min.js"></script>
<script src="/tams/javascripts/isotope.pkgd.min.js"></script>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<!-- <script>tinymce.init({ selector:'textarea' });</script> -->

<!-- js -->
<script src="/tams/javascripts/delete.js"></script>
<script src="/tams/javascripts/edit.js"></script>
<script src="/tams/javascripts/process.js"></script>

</head>

<body onload="clock()">
	<?php 
	include "modals.php"; 
		if(!isset ($_GET["chez"]))
			include "login.php";
		else
			include $_GET["chez"]; 

	include("include/footer.php");
	?>		

</body>
