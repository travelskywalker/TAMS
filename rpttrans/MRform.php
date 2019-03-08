<?php
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}
?>
<head>
<?php include_once("include/addstyle.php");?>
<script src="javascripts/clock.js"></script>
</head>

<style>
body { margin-top:20px; background-color:#EEEEEE;}
thead { font-family: arial;background-color: #ddccee;}


</style>


<body>

<title>Generate Memorandum Receipt</title>
<div class="container">

<?php include_once("include/navigation.php");?>
</div>
<p>&nbsp;</p>

<div class="container">
<fieldset class="container">
<legend><center>MR form</center></legend>
<center><p><b> Fill-up the form </b></p></center>
<form action="reports/mr.php?=generate" method="post" name="mrform" id="mrform">
<table width="70%" border="0" align="center">
<tr> 
<td>
MR Number: &nbsp;
	<select name="mrno" id="mrno" required>
    <option value="">MR Number</option>
   
  <?php
  $sql = "SELECT * FROM tbl_assetassign";
	$result = dbQuery($sql); 
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
	?>
	<option value="<?php echo $mrno; ?>"><?php echo $mrno; ?></option>
	
	<?php
	}
	?>
	
	</td>
	</tr>

	</select><br>
   </td>
  </tr>

  </form>
</table><br>

 <p align="center"> 
  <input name="btnmr" type="submit" class="btnmr" id="btnmr" value="View">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php?chez=main.php';">  
 </p>

</fieldset>
  
</div>
</body>
