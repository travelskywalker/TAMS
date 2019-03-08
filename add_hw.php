<?php 

$sql = "SELECT DISTINCT type FROM tbl_invcat where not type = 'Software'";
$sql = "SELECT DISTINCT classcode,classdesc from tbl_assetclass";
$result = dbQuery($sql); 
?>
<head>
<?php include_once("include/addstyle.php");?>
<?php include_once("include/moneyform.php");?>

</head>

<body>

<title>TAMS Add New Asset</title>
<div class="container">

</div>
<p>&nbsp;</p>
	
<div class="container">
<fieldset class="container">
<legend><center>Add New Item</center></legend>
<form action="process/assetadd.php?action=add" method="post" name="frmAddasset" id="frmAddasset" enctype="multipart/form-data">
<table width="100%" border="0" align="center">

	<tr> 
	<td>
	<td>
	 	
	<b>Description:</b>

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

	<b>Specifications:</b>
	<textarea class="txtarea" name= "specs" id="specs" maxlength= "1000"></textarea><br>
	
	   <?php
   $sql1 = "select * from tbl_swinfo where swassigned = '0' and swassettype ='Operating System'";
	$result1 = dbQuery($sql1); 
?>	
	
 <tr> 
 <td>
 <td>
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
 
 </p>

</div>