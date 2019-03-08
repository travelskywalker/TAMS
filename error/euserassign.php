<?php 
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

$errorMessage = 'Cannot Assign Asset Please check your Duplicate Entry in MR No. / Asset Code / Serial Number';
?>
<head>
<?php include_once("include/addstyle.php");?>
<?php include_once("include/moneyform.php");?>
<script src="javascripts/clock.js"></script>
<script src="javascripts/numberonly.js"></script>
<script src="javascripts/jquery.min.js" language="javascript"></script>
</head>


<body>

<title>TAMS Asset Assignment</title>
<div class="container">
<?php include_once("include/navigation.php");?>
</div>
<p>&nbsp;</p>

<div class="container">
  <div class="alert alert-danger">
<center><strong><p class="errorMessage"><?php echo $errorMessage; ?></p></strong></center>
</div>

<h2>Asset Assignment</h2>
<p><img src="images/assignasset.png" height="150" width="150" align="left"/> </p>
<strong>This page allow an administrator to assign all registered Assets to the End User.</strong> 

<p>&nbsp;</p>
	
<div class="container">
<fieldset class="container">
<legend><center>Asset Assignment</center></legend>
<form action="process/assetassign.php" method="post" name="frmassetassign" id="frmassetassign">
<table width="90%" border="0" align="center">
<tr> 

    <td><b> MR No.</b> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;               
     <?php 
	 
	  $sqlacode = "select max(mrno) as mrno from tbl_assetassign"; 
	  $resultacode = dbQuery($sqlacode); 
	  
	  while($row = dbFetchAssoc($resultacode)) {
		extract($row);
		?>
	  <input name="mrno" type="text" id="mrno" maxlength="5" onKeyUp="checkNumber(this);" value = "<?php 
	  echo str_pad($mrno+1,5,0, STR_PAD_LEFT);?>"required >
	<?php
	}
	?>&nbsp;
	
	<b>Asset Code:</b>
    <select class="formdrop1" name="assetclass" type="text" id="assetclass" required> 
	<option value="">Select Class</option>
	  <?php
	  	
	$sql = "SELECT DISTINCT classcode,classdesc from tbl_assetclass";
	$result = dbQuery($sql);
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
	?>
	<option value="<?php echo $classcode; ?>"><?php echo ucwords ($classcode.", ".$classdesc); ?></option>
	<?php
	}
	?>
      </select>&nbsp;
	  <?php 
	 
	  $sqlacode = "select max(assetcode) as assetcode from tbl_assetassign"; 
	  $resultacode = dbQuery($sqlacode); 
	  
	  while($row = dbFetchAssoc($resultacode)) {
		extract($row);
		?>
	  <input name="assetcode" type="text" id="assetcode" maxlength="10" onKeyUp="checkNumber(this);" value = "<?php 
	  echo str_pad ($assetcode+1,10,0, STR_PAD_LEFT);?>"required >
	<?php
	}
	?>
	</td>
	</tr>

	<tr>
   <td><b>Select Asset</b>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;

   <select name="hwctrlnum" id="hwctrlnum" required>
    <option value="">Select Asset</option>
	
  <?php
  $sql = "select * from tbl_hwinfo where assigned = '0'";
$result = dbQuery($sql); 
	while($row = dbFetchAssoc($result)) {
		extract($row);
	?>
	<option value="<?php echo $ctrlnum; ?>"><?php echo ($assetdesc);?></option>
	
	<?php
	}
	?>
	<!--checkbox for Serial Number-->
	</select>
	 <input type="checkbox" id="serial" name="serial">
	 <b><label for="serialnum">Serial Number</b></label>
	 <input name="serialnum" type="text" id="serialnum" maxlength="20" placeholder="enter serial number" disabled></input> <br>
	 
<script>
  document.getElementById('serial').onchange = function() {
    document.getElementById('serialnum').disabled = !this.checked;
};
</script>
	 
  </td>
  </tr>

<!--checkbox for OS Software-->
  <tr>
  <td><input type="checkbox" id="os" name="os">
  <b><label for="os">Operating System</b></label>
  <select id="OS" name="OS">
    <option>Select Operating System</option>
<!--script for selection-->
<?php
  $sql = "select * from tbl_swinfo where swassigned = '0' and swassettype = 'Operating System'";
$result = dbQuery($sql); 
	while($row = dbFetchAssoc($result)) {
		extract($row);
	?>
	<option value="<?php echo $swassetcode; ?>"><?php echo ($swassetdesc." (".$swqty." license left )"." - ".$swprodkey);?></option>
	
	<?php
	}
	?>
	</select>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
  var update_OS = function () {
    if ($("#os").is(":checked")) {
        $('#OS').prop('disabled', false);
    }
    else {
        $('#OS').prop('disabled', 'disabled');
    }
  };
  $(update_OS);
  $("#os").change(update_OS);
</script>
</td>
</tr>
<!--end of script--> 

<!--checkbox for AV Software-->
<tr>
<td>
 <input type="checkbox" id="av" name="av">
  <b><label for="av">Antivirus</b></label>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <select id="AV" name="AV">
    <option>Select Antivirus</option>
<!--script for selection-->
<?php
  $sql = "select * from tbl_swinfo where swassigned = '0' and swassettype = 'Antivirus'";
$result = dbQuery($sql); 
	while($row = dbFetchAssoc($result)) {
		extract($row);
	?>
	<option value="<?php echo $swassetcode; ?>"><?php echo ($swassetdesc." (".$swqty. " license left )"." - ".$swprodkey);?></option>
	
	<?php
	}
	?>
	</select>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
  var update_AV = function () {
    if ($("#av").is(":checked")) {
        $('#AV').prop('disabled', false);
    }
    else {
        $('#AV').prop('disabled', 'disabled');
    }
  };
  $(update_AV);
  $("#av").change(update_AV);
</script>
</td>
</tr>
<!--end of script--> 

<!--checkbox for Office Software-->
<tr>
<td>
 <input type="checkbox" id="office" name="office">
  <b><label for="office">Office Software</b></label>&nbsp; &nbsp;&nbsp;
  <select id="OF" name="OF">
    <option>Select Office</option>
<!--script for selection-->
<?php
  $sql = "select * from tbl_swinfo where swassigned = '0' and swassettype = 'Office'";
$result = dbQuery($sql); 
	while($row = dbFetchAssoc($result)) {
		extract($row);
	?>
	<option value="<?php echo $swassetcode; ?>"><?php echo ($swassetdesc." (".$swqty." license left )"." - ".$swprodkey);?></option>
	
	<?php
	}
	?>
	</select>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
  var update_OF = function () {
    if ($("#office").is(":checked")) {
        $('#OF').prop('disabled', false);
    }
    else {
        $('#OF').prop('disabled', 'disabled');
    }
  };
  $(update_OF);
  $("#office").change(update_OF);
</script>
</td>
</tr>
<!--end of script--> 
  
<tr>
   <td><b>Asset Assigned to</b>&nbsp;&nbsp;&nbsp;&nbsp; 

  <select name="empnum" id="empnum" required>
    <option value=""> Select User</option>
	 
	 <?php
	$sql = "select * from tbl_assignuser order by asgn_lname asc";
	$result = dbQuery($sql); 
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
	?>
	<option value="<?php echo $empnum;?>"><?php echo ucwords($asgn_lname.", ".$asgn_fname); ?></option>
	
	 <?php
	}
	?>
	</select>

	</td>
  </tr>
 
</form>
  
  </table><br>

  <p align="center"> 
  <input name="btnAssign" type="submit" class="btn btn-primary" id="btnAssign" value="Assign Asset"></input>
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="btn btn-danger"  value="Cancel" onClick="window.location.href='index.php?chez=main.php';"></input>  
 </p>
 </fieldset>
</div> 
</body>