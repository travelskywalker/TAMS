<?php 
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
		exit;
	}
?>

<head>

<script src="javascripts/clock.js"></script>
	
	</head>
	
<title> TAMS Home </title>

<style>
body { margin-top:20px; background-color:#EEEEEE;}

</style>

<body onload="clock()">

<div class="container">
<?php include_once("include/navigation.php");?>
</div>

<p>&nbsp;</p>
<div class="container">

<p align="center" style="font-size:30px;font-weight:bold;"> 
<?php
// Echo session variables that were set on previous page
echo "Hello " . $_SESSION["tams_first_name"]; 
?>
! WELCOME to</p>

<center><p><img class="img-fluid" src="images/tamshead.png" height="300" width="700"/> </p> </center>
</div>
</div>
