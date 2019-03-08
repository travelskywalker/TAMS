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
<script src="javascripts/delete.js"></script>
</head>

<style>
body { margin-top:20px; background-color:#EEEEEE;}
thead { font-family: arial;background-color: #ddccee;}

</style>


<body>

<title>Search Asset</title>
<div class="container">

<?php include_once("include/navigation.php");?>
</div>
<p>&nbsp;</p>

<div class="container">
<fieldset class="container">
<legend><center>Search Form</center></legend>
<center><p><b> View Summary of Assets </b></p></center>
<form action="process/searchhw.php?action=search" method="post" name="frmSearchhwasset" id="frmSearchhwasset">
<table width="90%" border="0" align="center">
<tr> 

<td>

<td> <center>Search mode by:
	<select name="type" id="type" required>
    <option value="">Select Category Type</option>
	<option value="1">All Hardware</option>
	<option value="2">All Software</option>
	<option value="4">Deleted Items</option>

	</select>

</center>

   </td>
  </tr>
  </form>
</table><br>

 <p align="center"> 
  <input name="btnsearchhwasset" type="submit" class="btn btn-primary" id="btnsearchhwasset" value="View">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="btn btn-danger"  value="Cancel" onClick="window.location.href='index.php?chez=main.php';">  
 </p>
</fieldset>
  
</div>
</body>
