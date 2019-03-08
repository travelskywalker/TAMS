<?php
require_once 'library/config.php';
require_once 'library/functions.php';
?>
<head>
<script src="javascripts/edit.js"></script>
</head>

<style>
body { margin-top:20px; }
</style>
<!-- Nav Design -->
<nav class="navbar navbar-expand-md bg-info navbar-dark">
   <a class="navbar-brand">
       <img src="images/tamslogo.png" alt="Logo" style="width:110px;">
  </a>
  

<!-- Nav Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
      <a class="nav-link" href="index.php?chez=usermain.php&tamsHOME">Home</a>
      <li class="nav-item">
    </li>
	</ul>
	  <ul class="navbar-nav">
    <li class="nav-item">
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Transaction</a>
	  <div class="dropdown-menu bg">
	  <a class="dropdown-item" href="index.php?chez=reports/userAssetStatus.php&tamsAssetupdate">Update Asset Status</a>
	  <a class="dropdown-item" href="index.php?chez=reports/userassetsummary.php&tamsSummary">List of Registered Assets</a>
    </li>
	<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Report Printing</a>
	   <div class="dropdown-menu bg">
	  <a class="dropdown-item" href="index.php?chez=rpttrans/userMRform.php&tamsMRForm">Memorandum Receipt</a>
	  <a class="dropdown-item" href="index.php?chez=reports/userAssignedAsset.php&VIEW">Assigned Assets</a>
    </li>
	  
	<li class="nav-item dropdown">
	
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" disabled> Settings </a>
	</li>
<!-- java clock -->	
	<div class="navbar" id="navclock" > </div>

	<ul class="navbar">
<?php
echo "" . $_SESSION["tams_user_type"];
?>
</ul>

<a class="btn navbar-warning" style="font-weight:bold" font color="red"  href="logout.php">Logout</a>

</ul>
</nav>



  



