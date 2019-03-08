<?php 
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

if (isset($_GET['a_classid']) && (int)$_GET['a_classid'] >= 0) {
	$a_classid= (int)$_GET['a_classid'];
	$queryString = "&a_classid=$a_classid";
} else {
	$a_classid = 0;
	$queryString = '';
}

?>
<head>
<script src="javascripts/clock.js"></script>
<script src="javascripts/delete.js"></script>

</head>

<style>
<style>
body { margin-top:20px; background-color:#EEEEEE;}
thead { font-family: arial;background-color: #ddccee;}

#classview {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#classview td, #catview th {
    border: 1px solid #090a0a;
    padding: 8px;
}

#classview tr:nth-child(even){background-color: #d4d6d8;}

#classview tr:hover {background-color: #e8a4ce;}

#classview th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #0099cc;
    color: white;
}

</style>
</style>

<body>

<title>TAMS Inventory Parameteres</title>
<div class="container">

<h2>Asset Class</h2>

  <div class="container">
  <div class="table-responsive-sm">
    <table class="table table-bordered table-sm" id="classview">
    <thead>
		
      <tr>
		<th>Class Code</th>
		<th>Description</th>
		<th>Delete</th>
		
      </tr>
	  </thead>
	  </div>
	
	<?php
	$sql = "select * from tbl_assetclass";
	$result = dbQuery ($sql);
	while($row = dbFetchAssoc($result)) {
	extract($row);
	?>
	<td><?php echo $classcode; ?></td> 
	<td><?php echo $classdesc; ?></td>
	  
	  	<td> <a  style="font-weight:normal;" href="javascript:deleteclass(<?php echo $a_classid; ?>);">
	  Delete</a>
     </tr>
	 
	 <?php
	}
	?>
	
  </table>
 
  
    <center><p> 
  <input name="back" type="submit" class="btn btn-Info" id="back" value="Back" onClick="window.location.href='index.php?chez=category.php';">
</p></center>
  </div>