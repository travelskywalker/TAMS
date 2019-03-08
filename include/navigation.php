<?php
require_once 'library/config.php';
require_once 'library/functions.php';
?>

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
      <a class="nav-link" href="index.php?chez=main.php&tamsHOME">Home</a>
      <li class="nav-item">
    </li>
	</ul>
	  <ul class="navbar-nav">
    <li class="nav-item">
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Transaction</a>
	  <div class="dropdown-menu bg">
	  <a class="dropdown-item" href="index.php?chez=add_item.php&tamsADDhardware">Add Item</a>
	  <a class="dropdown-item" href="index.php?chez=add_sw.php&tamsADDsoftware">Add Software</a>
	  <a class="dropdown-item" href="index.php?chez=userassign.php&tamsAssetAssignment">Asset Assignment</a>
	  <a class="dropdown-item" href="index.php?chez=reports/AssetStatus.php&tamsAssetupdate">Update Asset Status</a>
	  <a class="dropdown-item" href="index.php?chez=reports/assetsummary.php&tamsSummary">List of Registered Assets</a>
    </li>
	<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Report Printing</a>
	   <div class="dropdown-menu bg">
	  <a class="dropdown-item" href="index.php?chez=rpttrans/MRform.php&tamsMRForm">Memorandum Receipt</a>
	  <a class="dropdown-item" href="index.php?chez=reports/AssignedAsset.php&VIEW">Assigned Assets</a>
    </li>
	  
	<li class="nav-item dropdown">
	
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> Settings </a>
	  <div class="dropdown-menu bg">
	  <a class="dropdown-item" href="index.php?chez=category.php&tamsINVSet">Add/Edit Hardware Category</a>
	   <a class="dropdown-item dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Organizational Parameters</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?chez=deptparameters.php&tamsDEPTInfo">Department Information</a></li>
              <li><a class="dropdown-item" href="index.php?chez=areaparameters.php&tamsAREAInfo">Area Information</a></li>
			  <li><a class="dropdown-item" href="index.php?chez=branchparameters.php&tamsBRANCHInfo">Branch Information</a></li>
			   </ul> 
      <a class="dropdown-item" href="index.php?chez=endusers_view.php&tamsEmpMNGMT">Employee Management</a>
	  <a class="dropdown-item" href="index.php?chez=users_view.php&tamsUserMNGMT">User Management</a>
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



  



