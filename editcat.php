<?php
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

$catid =$_GET["catid"];
$sql_editcat = "SELECT * FROM tbl_invcat WHERE catid = $catid";
$result_editcat = dbQuery($sql_editcat);
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

<title> Edit Category </title>
<div class="container">
<form action="process/addcat.php?action=edit" method="post" name="EditCat" id="EditCat">
<center><h1>Edit Category</h1></center>
<?php
while($chez = dbFetchAssoc($result_editcat)){
extract($chez);
?>
<center><table> 
 <tr> 
   <td><b>Category Description</b></td><input type="hidden" name="catid" value="<?php echo $catid; ?>">
   <td> <input disabled class="form-control" name="classcode" type="text" id="classcode" size="40"  maxlength="40" value="<?php echo$classcode;?>" required></td>
  </tr>
 <tr> 
   <td><b>Asset Category</b></td>
   <td> <input class="form-control" name="assetcat" type="text" id="assetcat" size="40"  maxlength="40" value="<?php echo$assetcat;?>" required></td>
  </tr>
  <tr>
    <td><b>Type</b></td>
    <td><input class="form-control" name="type" type="text" id="type" size="40" maxlength="50" value="<?php echo$type;?>"required></td>
  </tr>
 
  </body>

  </table></center>
  </div>	  
		&nbsp;
        <p align="center"> 
        <input name="SaveEditCat" type="submit" class="button" value="Save"> </input> 
		 &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php?chez=category.php';">  
 </p>

<?php 
} 
?>		
   </body>