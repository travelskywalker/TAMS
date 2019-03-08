<?php 
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

$sql = "SELECT DISTINCT assetcat,classcode FROM tbl_invcat where type = 'software'";
$result = dbQuery($sql); 
?>
<head>
<?php include_once("include/addstyle.php");?>
<?php include_once("include/moneyform.php");?>
<script src="javascripts/intgeronly.js"></script>
<script src="javascripts/clock.js"></script>
<script src="javascripts/numberonly.js"></script>
<script src="javascripts/jquery.min.js" language="javascript"></script>
</head>

<body>
<title>TAMS Add New Asset</title>
<div class="container">
<?php include_once("include/navigation.php");?>
</div>
<p>&nbsp;</p>

<div class="container">

<h2>Software Information</h2>
<p><img src="images/swicon.png" height="100" width="100" align="left"/> </p> 
<strong>This page allow an administrator and/or user to add company's list of software and licenses.</strong>
<p>
This is the form where you can add all types of software and licenses bought by the company. 
</p>
<p>&nbsp;</p>
	
<div class="container">
<fieldset class="container">
<legend><center>Software Information</center></legend>

<form action="process/swadd.php?action=add" method="post" name="frmAddsoftware" id="frmAddsoftware">
<table width="90%" border="0" align="center">

<tr> 
`   <td width="150">Asset Code</td>
   <td><input name="swclass" type ="text" id = "swclass" value="ME" disabled></input>
   
    <?php 
	 
	  $sqlacode = "select max(swassetcode) as swassetcode from tbl_swinfo"; 
	  $resultacode = dbQuery($sqlacode); 
	  
	  while($row = dbFetchAssoc($resultacode)) {
		extract($row);
		?>
	  <input name="swassetcode" type="text" id="swassetcode" maxlength="10" onKeyUp="checkNumber(this);" value = "<?php 
	  echo str_pad($swassetcode+1,10,0, STR_PAD_LEFT);?>"required ></input>
	<?php
	}
	?>&nbsp;
  
  </td>
  </tr>

 `<tr> 
   <td width="150"></td>
   
   <td> <select name="swcat" id="swcat" required>
	<option value="">Select Type</option>
	<option value="Operating System">Operating System</option>
	<option value="Antivirus">Antivirus</option>
	<option value="Office">Office</option>
	</select> &nbsp;
  
   Software Description <input name="swassetdesc" type="text" id="swassetdesc"  maxlength="50" required></input>&nbsp;
   
 <tr> 
   <td width="150">Product Key</td>
   <td> <input name="swprodkey" type="text" id="swprodkey" maxlength="50"></input>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
   Quantity <input name="swqty" type="text" id="swqty"  maxlength="5" onKeyUp="checkNumber(this);" required ></input>&nbsp;
   </td>
  </tr>
  
  <tr> 
   <td width="150">Acquisition Date</td>
   <td> <input name="swacqdate" type="date" id="swacqdate"></input>&nbsp;
   Expiration Date
   <input name="swexpdate" type="date" id="swexpdate"></input>
		</td>
  </tr>
  
   <tr> 
   <td width="150">Acquisition Cost</td>
 
   <td> <div class="money">
    <div>₱</div><input type="text" class="numberOnly" autocomplete="on" maxlength="50" name="swacqcost" id="swacqcost" required />
	</div> </div> <script src="javascripts/moneyformat.js"></script>
	
	</td>
	
  </tr>
 </table>

  <p align="center"> 
  <input name="btnAddsw" type="submit"   class="button" id="btnAddsw" value="Add Software" onClick="checkAddAssetForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php?chez=main.php';" class="box">  
 </p>

</fieldset>

</div>
	`