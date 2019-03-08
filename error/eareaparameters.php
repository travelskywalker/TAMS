<?php 
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

$errorMessage = 'Area Code Already Taken';
	
if (isset($_GET['areaid']) && (int)$_GET['areaid'] >= 0) {
	$areaid= (int)$_GET['areaid'];
	$queryString = "&areaid=$areaid";
} else {
	$areaid = 0;
	$queryString = '';
}


$sql = "select * from tbl_area order by areacode";
$result = dbQuery ($sql);
?>

<head>
<script src="javascripts/clock.js"></script>
<script src="javascripts/delete.js"></script>
<script src="javascripts/intgeronly.js"></script>
</head>

<style>
body { margin-top:20px; background-color:#EEEEEE;}
thead { font-family: arial;background-color: #ddccee;}

#areainfo {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#areainfo td, #areainfo th {
    border: 1px solid #090a0a;
    padding: 8px;
}

#areainfo tr:nth-child(even){background-color: #d4d6d8;}

#areainfo tr:hover {background-color: #e8a4ce;}

#areainfo th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #0099cc;
    color: white;
}
</style>


<title>Organizational Parameters</title>
<div class="container">
<?php include_once("include/navigation.php");?>
</div>
<p>&nbsp;</p>

<div class="container">
  <div class="alert alert-danger">
<center><strong><p class="errorMessage"><?php echo $errorMessage; ?></p></strong></center>
</div>

<form action="process/addarea.php?action=add" method="post" name="frmAddarea" id="frmAddarea">

<h2>Organizational Parameters</h2>
<p><img src="images/org.png" height="100" width="100" align="left"/> </p> 
<strong>This page allow an administrator to add the data needed by the system.</strong>
<p>
For the accuracy of data in the system the Administrator must add all Information needed for Department, Area and Branch.  
</p>
</div>

<div class="container">
<center><h2>Area Information</h2></center>

<p>&nbsp;</p>

  <div class="container">
<div class="table-responsive-sm">
    <center><table id="areainfo" >
    <thead>
      <tr>
		<th> Area Code</th>
		<th>Area Name</th>
		<th>Delete
      </tr>
	  </thead>
	  </div>
	
	<?php
	while($row = dbFetchAssoc($result)) {
	extract($row);
	?>
	
	<td><?php echo $areacode; ?></td>
	<td><?php echo $areaname; ?></td>

	  <td> <a  style="font-weight:normal;" href="javascript:deleteArea(<?php echo $areaid; ?>);">
	  Delete</a>
     </tr>
	 
	 <?php
	}
	?>
  </table></center>
  </div> <br>

    <!-- Button to Open the Modal -->
<center>  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addarea">
   Add New Area
  </button> </center>
  
   <!-- The Modal -->
  <div class="modal fade" id="addarea">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Area</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
		
	<!-- Modal body -->
  
<div class="modal-body">

<table>
<tr> 
    <tr> 
   <td>Area Code</td>
   <td> <input class ="form-control" input name="areacode" type="text" id="areacode" size="50" maxlength="6" onKeyUp="checkNumber(this);"  required></td>
  </tr>
   
   <td>Area Name</td>
   <td> <input class="form-control" name="areaname" type="text" id="areaname" size="50" maxlength="50" required></td>
  </tr>
 </table>
 </div>
 
         <!-- Modal footer -->
		<form id ="btnAdd">
        <div class="modal-footer">
        <input name="btnAddarea" type="submit" class="btn btn-Info" id="btnAddarea" value="Add Area"> </input> 
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			
        </div>
		</form>
        
</div>
</div>
</div>
</div>

  
