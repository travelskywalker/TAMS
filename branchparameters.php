<?php 
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}
	

if (isset($_GET['branchid']) && (int)$_GET['branchid'] >= 0) {
	$branchid= (int)$_GET['branchid'];
	$queryString = "&branchid=$branchid";
} else {
	$branchid = 0;
	$queryString = '';
}

$sql = "select * from tbl_branch JOIN tbl_area ON tbl_branch.areacode=tbl_area.areacode order by branchcode";
$result = dbQuery ($sql);
?>

<head>
<script src="javascripts/clock.js"></script>
<script src="javascripts/delete.js"></script>
<script src="javascripts/intgeronly.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></script>
<script src="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script> $(document).ready(function() {
    $('#branchinfo').DataTable();
} );	</script>

</head>

<style>
body { margin-top:20px; background-color:#EEEEEE;}
thead { font-family: arial;background-color: #ddccee;}

#branchinfo {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#branchinfo td, #branchinfo th {
    border: 1px solid #090a0a;
    padding: 8px;
}

#branchinfo tr:nth-child(even){background-color: #d4d6d8;}

#branchinfo tr:hover {background-color: #e8a4ce;}

#branchinfo th {
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
<h2>Organizational Parameters</h2>
<p><img src="images/org.png" height="100" width="100" align="left"/> </p> 
<strong>This page allow an administrator to add the data needed by the system.</strong>
<p>
For the accuracy of data in the system the Administrator must add all Information needed for Department, Area and Branch.  
</p>
</div>

<form action="process/addbranch.php?action=add" method="post" name="frmAddbranch" id="frmAddbranch">
<div class="container">
<center><h2>Branch Information</h2></center>


  <div class="container">
	<div class="table-responsive-sm">
    <table id="branchinfo">
    <thead>
      <tr>
		<th>Area</th>
		<th>Branch Code</th>
		<th>Branch Name</th>
		<th>Delete
		
      </tr>
	  </thead>
	  </div>
	
	<?php
	while($row = dbFetchAssoc($result)) {
	extract($row);
	
	?>
	
	<td><?php echo $areaname; ?></td>
	<td><?php echo $branchcode; ?></td>
	<td><?php echo $branchname; ?></td>

	  <td> <a  style="font-weight:normal;" href="javascript:deleteBranch(<?php echo $branchid; ?>);">
	  Delete</a>
     </tr>
	 
	 <?php
	}
	?>
  </table></center>
  </div> <br>

    <!-- Button to Open the Modal -->
<center>  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addbranch">
   Add New Branch
  </button> 
    <button class="btn btn-primary" onclick="myFunction()">Print this page</button>
		<script>
		function myFunction() {
		window.print();
		}
		</script>
  </center>
  
   <!-- The Modal -->
  <div class="modal fade" id="addbranch">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Branch</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
		
	<!-- Modal body -->
  
<div class="modal-body">

<table>

<?php
$sql = "SELECT areacode, areaname FROM tbl_area AS areaname";
$result = dbQuery ($sql);
?>

<tr>
<td>Area Name </td>
  <td> <select class="form-control" name="arbrcode" id="arbrcode" required>
    <option value=""> Select Area</option>
   
  <?php
	while($row = dbFetchAssoc($result)) {
		extract($row);
	?>
	<option value="<?php echo $areacode; ?>"><?php echo $areaname; ?></option>
	<?php
	}
	?>
	</select>
	</td>
</tr>

 <tr> 
   <td>Branch Code</td>
   <td> <input class="form-control" name="branchcode" type="text" id="branchcode" size="50" maxlength="6" onKeyUp="checkNumber(this);" required></td>
  </tr>

<tr> 
   <td>Branch Name</td>
   <td> <input class="form-control" name="branchname" type="text" id="branchname" size="50" maxlength="50" required></td>
  </tr>

 </table>
 </div>
 
         <!-- Modal footer -->
		<form id ="btnAdd">
        <div class="modal-footer">
        <input name="btnAddbranch" type="submit" class="btn btn-Info" id="btnAddbranch" value="Add Branch"> </input> 
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			
        </div>
		</form>
        
</div>
</div>
</div>
</div>
  
