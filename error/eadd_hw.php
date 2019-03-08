<?php 
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

$errorMessage = 'Invoice Number Already Taken';

$sql = "SELECT DISTINCT type FROM tbl_invcat where not type = 'Software'";
$sql = "SELECT DISTINCT classcode,classdesc from tbl_assetclass";
$result = dbQuery($sql); 
?>
<head>
<?php include_once("include/addstyle.php");?>
<?php include_once("include/moneyform.php");?>
<script src="javascripts/clock.js"></script>
<script src="javascripts/intgeronly.js"></script>
 <!-- Isotope JS -->
    <script src="javascripts/imagesloaded.pkgd.min.js"></script>
    <script src="javascripts/isotope.pkgd.min.js"></script>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</head>

<body>

<title>TAMS Add New Asset</title>
<div class="container">
<?php include_once("include/navigation.php");?>
</div>
<p>&nbsp;</p>

<div class="container">
  <div class="alert alert-danger">
<center><strong><p class="errorMessage"><?php echo $errorMessage; ?></p></strong></center>
</div>
<h2>Hardware Information</h2>
<p><img src="images/addhw.png" height="100" width="100" align="left"/> </p> 
<strong>This page allow an administrator and/or user to add company's valuable assets.</strong>
<p>
This is the form where you can add the types of company assets like computer hardware, peripherals and accessories
Furnitures and Office Equipment. 
</p>
<p>&nbsp;</p>
	
<div class="container">
<fieldset class="container">
<legend><center>Hardware Information</center></legend>
<form action="process/assetadd.php?action=add" method="post" name="frmAddasset" id="frmAddasset" enctype="multipart/form-data">
<table width="100%" border="0" align="center">

	<tr> 
	<td>
	<td>
	 <?php 
	 
	  $sqlacode = "select max(ctrlnum) as ctrlnum from tbl_hwinfo"; 
	  $resultacode = dbQuery($sqlacode); 
	  
	  while($row = dbFetchAssoc($resultacode)) {
		extract($row);
		?>
	<b>Control Number:</b> <input name="ctrlnum" type="text" id="ctrlnum" maxlength="10" value = "<?php echo str_pad ($ctrlnum+1,6,0, STR_PAD_LEFT);?>" readonly></input><br>
	
	<b>Description:</b>
	<?php
	}
	?>
	<select name="cat" id="cat" required>
	<option value="">Select Category</option>
	<?php
	$sql = "SELECT DISTINCT assetcat FROM tbl_invcat where not type = 'Software'";
	$result = dbQuery($sql); 
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
	?>
	<option value="<?php echo $assetcat; ?>"><?php echo $assetcat; ?></option>
	<?php
	}
	?>
	</select> &nbsp;
	
	<input name="assetdesc" type="text" id="assetdesc" maxlength="50" placeholder="Brand And Model" required>&nbsp;<br>
	
  </td>
  </td>
  </tr>
  
  <tr>
  <td>
  <td>
	<label for="prodimg"><b>Add Image</b></label>
	<div class="uploadBtn"><input type="file" id="prodimg" class="img-responsive" name="prodimg" accept="image/*"></div><br>

	<b>Specifications and Accessories:</b>
	<textarea class="txtarea" name= "specs" id="specs" maxlength= "1000"></textarea><br>
	
	   <?php
   $sql1 = "select * from tbl_swinfo where swassigned = '0' and swassettype ='Operating System'";
	$result1 = dbQuery($sql1); 
?>	
	
 <tr> 
 <td>
   <td> <b>Invoice Number</b>&nbsp;<input name="invnum" type="text" id="invnum" maxlength="50">&nbsp;
   <b>Quantity</b>&nbsp;<input name="qty" type="text" id="qty" maxlength="10" onKeyUp="checkNumber(this);" required > </td>
</td>
  </tr>
  
  <tr> 
   <td><b>Acquisition Date</b></td>
   <td> <input name="acqdate" type="date" id="acqdate" required>&nbsp;
   <b>Depreciation</b>
   	<select class="formdrop2"  name="depr" type="number" id="depr" required> 
	<option value="">(In Years)</option>
	<option value="0">1</option>
	 <option value="3">3</option>
	 <option value="5">5</option>
        <option value="10">10</option>
		<option value="15">15</option>
		</td>
  </tr>
  
 <tr> 
   <td><b>Acquisition Cost</b></td>
    <td> <div class="money">
    <div>₱</div><input type="text" class="numberOnly" autocomplete="on" maxlength="10" name="acqcost" id="acqcost" required />
	</div> <script src="javascripts/moneyformat.js"></script>
	</td>
  </tr>
 </table><br>

  <p align="center"> 
  <input name="btnAddasset" type="submit" class="button" id="btnAddasset" value="Add Hardware">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php?chez=main.php';">  
 </p>

</div>