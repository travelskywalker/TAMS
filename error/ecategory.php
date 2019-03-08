<?php 
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

$errorMessage = 'Unable to Add Category Please check your entry';
	
if (isset($_GET['catid']) && (int)$_GET['catid'] >= 0) {
	$catid= (int)$_GET['catid'];
	$queryString = "&catid=$catid";
} else {
	$catid = 0;
	$queryString = '';
}


$sql = "select * from tbl_invcat order by type";
$result = dbQuery ($sql);

?>
<head>
<script src="javascripts/clock.js"></script>
<script src="javascripts/delete.js"></script>
<script src="javascripts/edit.js"></script>
</head>

<style>
body { margin-top:20px; background-color:#EEEEEE;}
thead { font-family: arial;background-color: #ddccee;}

#catview {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#catview td, #catview th {
    border: 1px solid #090a0a;
    padding: 8px;
}

#catview tr:nth-child(even){background-color: #d4d6d8;}

#catview tr:hover {background-color: #e8a4ce;}

#catview th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #0099cc;
    color: white;
}
</style>

<body>

<title>TAMS Category List</title>
<div class="container">
<?php include_once("include/navigation.php");?>
</div>
<p>&nbsp;</p>

<form action="process/addcat.php?action=add" method="post" name="AddCat" id="Addcat">

<div class="container">

 <div class="alert alert-danger">
<center><strong><p class="errorMessage"><?php echo $errorMessage; ?></p></strong></center>
</div>

<h2>Category</h2>
<p><img src="images/cat.png" height="100" width="100" align="left"/> </p> 
<strong>&nbsp;This page allow an administrator to add the list of categories for Inventory System.</strong>

<p>&nbsp;</p>
<p>&nbsp;</p>

  <div class="container">
  <div class="table-responsive-sm">
    <table class="table table-bordered table-sm" id="catview">
    <thead>
		
      <tr>
		<th>Class Description</th>
		<th>Asset Category</th>
		<th>Type</th>
		<th>Delete / Edit</th>
		
      </tr>
	  </thead>
	  </div>
	
	<?php
	$sql = "select * from tbl_invcat JOIN tbl_assetclass ON tbl_invcat.classcode=tbl_assetclass.classcode";
	$result = dbQuery ($sql);
	while($row = dbFetchAssoc($result)) {
	extract($row);
	?>
	<td><?php echo $classcode . ", ". $classdesc ?></td> 
	<td><?php echo $assetcat; ?></td>
      <td><?php echo $type; ?></td>
	  
	  	<td> <a  style="font-weight:normal;" href="javascript:deletecat(<?php echo $catid; ?>);">
	  Delete</a> /<a  style="font-weight:normal;" href="javascript:editcategory(<?php echo $catid; ?>);">
	  Edit</a></td>
     </tr>
	 
	 <?php
	}
	?>
  </table>
  </div>

   <p> 
  <input name="btnviewparms" type="submit" class="btn btn-Info id="btnviewparms" value="Asset Class List" onClick="window.location.href='index.php?chez=invparms.php';">
</p>
  
    <!-- Button to Open the Modal -->
<center>  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcat">
    Add New Category
  </button> </center>

  <!-- The Modal -->
  <div class="modal fade" id="addcat">
    <div class="modal-dialog">
      <div class="modal-content">
	  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">New Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->

<div class="modal-body">
<table>
   <td><b>Category Description</b></td>
   <td> <input class="form-control" name="assetcat" type="text" id="assetcat" size="40" maxlength="50" placeholder="ex.Printer, System Unit, Monitor etc."required ></td>
  </tr>

<tr> 
   <td><b>Asset Class</b></td>
   <td>
	 <?php
   $sql = "SELECT classcode, classdesc FROM tbl_assetclass";
   $result = dbQuery ($sql);
   ?>
 
    <select class="form-control" name="classcode" type="text" id="classcode"> 
	<option value="">Choose Class</option>
	  <?php
   	while($row = dbFetchAssoc($result)) {
	extract($row);
   ?>
	<option value="<?php echo $classcode; ?>"><?php echo"(" .($classcode). ") " . $classdesc; ?></option>
	<?php
	}
	?>
      </select>
	  
   <td> 
   <td>
   	  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addclass" width = "3px">
		Add New Class
		</button> </td>
  </tr>
 
 <tr>
 <td><b>Category Type</b><br>
 ex. Hardware, Software etc.</td>
   <td>
  
   <?php
   $sql = "SELECT DISTINCT type FROM tbl_invcat";
   $result = dbQuery ($sql);
   ?>
    <select class="form-control" name="type" type="text" id="type"> 
	<option value="">Choose Category</option>
	  <?php
   	while($row = dbFetchAssoc($result)) {
	extract($row);
   ?>
	<option value="<?php echo $type; ?>"><?php echo($type); ?></option>
	<?php
	}
	?>
      </select>
	   <input class="form-control" name="typenew" type="text" id="typenew" size="40" maxlength="50" placeholder="Enter new category here"></input>
	  
  </td>
  </tr>
    
 </table>
        </div>
        
        <!-- Modal footer -->
		<form id ="btnAdd">
        <div class="modal-footer">
        <input name="buttonAddUser" type="submit" class="btn btn-Info" value="OK"> </input> 
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			

			
        </div>
		</form>
        
      </div>
    </div>
  </div>
  </div>

  
</div>

<!--sub Modal for Asset Class-->
<?php

if (isset($_GET['a_classid']) && (int)$_GET['a_classid'] >= 0) {
	$a_classid= (int)$_GET['a_classid'];
	$queryString = "&a_classid=$a_classid";
} else {
	$a_classid = 0;
	$queryString = '';
}

?>
	  <div class="modal fade" id="addclass">
    <div class="modal-dialog">
      <div class="modal-content">

	  <div class="modal-header" background-color ='#6665'>
          <h4 class="modal-title">New Asset Class</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
		
		<div class="modal-body">
<form action="process/addassetclass.php?action=add"" method="post" name="AddClass" id="AddClass">
<table>

<tr> 

   <td><b>Class Code</b></td>
   <td> <input class="form-control" name="classcode" type="text" id="classcode" size="40" maxlength="5" placeholder="ex. ME, CE, OfE"required ></td>
  </tr>
  
  <td><b>Class Description</b></td>
   <td> <input class="form-control" name="classdesc" type="text" id="classdesc" size="40" maxlength="50" placeholder="ex.Minor Equipment"required ></td>
  </td>
   </table>
  </div>
  <!-- Modal footer -->
		<form id ="btnAdd">
        <div class="modal-footer">
        <input name="buttonAddUser" type="submit" class="btn btn-Info" value="OK"> </input> 
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
</form>

        </div>
    </div>
	</div>
  </div>
  
 
</body>
