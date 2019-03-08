<?php
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

$assetid =$_GET["assetid"];
$sql_editasset = "SELECT * FROM tbl_hwinfo WHERE assetid = $assetid";
$result_editasset = dbQuery($sql_editasset);

?> 

<head>

<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
<script src="js/bootstrap.min.js"></script>

<!--CDN for Navbar-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
   <!-- Isotope JS -->
    <script src="javascripts/imagesloaded.pkgd.min.js"></script>
    <script src="javascripts/isotope.pkgd.min.js"></script>
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

</head>

<style>
body { margin-top:20px; background-color:#EEEEEE;}
thead { font-family: arial;background-color: #ddccee;}

fieldset {
	width: 100%;
	background-color: #ddeeff;
	border: solid medium #053972;
	border-radius:20px;}

</style>
<body>

<title> Edit Asset </title>
<div class="container">
<form action="process/assetadd.php?action=edit" method="post" name="UpdateAsset" id="UpdateAsset" enctype="multipart/form-data">
<center><h1>Edit Asset</h1></center>
<?php
while($chez = dbFetchAssoc($result_editasset)){
extract($chez);
?>
<center><table> 
 <tr> 
   <input type="hidden" name="assetid" value="<?php echo $assetid; ?>">
     </tr>
 <tr> 
   <td><b>Description</b></td>
   <td> <input class="form-control" name="assetdesc" type="text" id="assetdesc" size="40"  maxlength="40" value="<?php echo$assetdesc;?>" required></td>
   
  <tr>
  <td><label for="prodimg"><b>Add / Replace Image</b></label></td>
	<td><div class="uploadBtn"><input type="file" id="prodimg" class="img-responsive" name="prodimg" accept="image/* value="<?php echo$prodimg;?>" ></div><br>
	</td>
	</tr>
  <tr>
	<td><b>Specifications</b></td>
	<td> <textarea class="form-control" name="specs" id="specs" rows="4" cols="50" value="test"> </textarea></td>
	</td>
	</tr>
  </body>

  </table></center>
  </div>	  
		&nbsp;
        <p align="center"> 
        <input name="SaveEditAsset" type="submit" class="button" value="Update"> </input> 
		 &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php?chez=reports/HardwareAssets.php';">  
 </p>

<?php 
} 
?>		
   </body>