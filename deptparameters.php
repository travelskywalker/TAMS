<?php 
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

if (isset($_GET['deptid']) && (int)$_GET['deptid'] >= 0) {
	$deptid= (int)$_GET['deptid'];
	$queryString = "&deptid=$deptid";
} else {
	$deptid = 0;
	$queryString = '';
}

$sql = "select * from tbl_branch JOIN tbl_area ON tbl_branch.areacode=tbl_area.areacode";
$sql = "SELECT areacode, areaname FROM tbl_area AS deptname";
$sql = "select * from tbl_dept order by deptcode";
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

#deptinfo {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#deptinfo td, #deptinfo th {
    border: 1px solid #090a0a;
    padding: 8px;
}

#deptinfo tr:nth-child(even){background-color: #d4d6d8;}

#deptinfo tr:hover {background-color: #e8a4ce;}

#deptinfo th {
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

<form action="process/addorg.php?action=add" method="post" name="frmAddOrg" id="frmAddOrg">
<div class="container">
<center><h2>Department Information</h2></center>

<p>&nbsp;</p>

  <div class="container">
	<div class="table-responsive-sm">
    <table id="deptinfo">
    
    <thead>
      <tr>
		<th>Department Code</th>
		<th>Department Name</th>
		<th>Delete</th>
		
      </tr>
	  </thead>
	  </div>
	
	<?php
	while($row = dbFetchAssoc($result)) {
	extract($row);
	?>
	
	<td><?php echo $deptcode; ?></td>
	<td><?php echo $deptname; ?></td>

	  <td> <a  style="font-weight:normal;" href="javascript:deleteOrg(<?php echo $deptid; ?>);">
	  Delete</a>
     </tr>
	 
	 <?php
	}
	?>
  </table></center>
 <br>
</div> 

    <!-- Button to Open the Modal -->
<center>  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddept">
   Add New Department
  </button> </center>

   <!-- The Modal -->
  <div class="modal fade" id="adddept">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Department</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
		
	<!-- Modal body -->
  
<div class="modal-body">
<table>

 <tr> 
   <td>Department Code</td>
   <td> <input class ="form-control" input name="deptcode" type="text" id="deptcode" size="50" maxlength="4" onKeyUp="checkNumber(this);"  required></td>
  </tr>

<tr> 
   <td>Department Name</td>
   <td> <input class="form-control" name="deptname" type="text" id="deptname" size="50" maxlength="50" required></td>
  </tr>

 </table>
 </div>
 
         <!-- Modal footer -->
		<form id ="btnAdd">
        <div class="modal-footer">
        <input name="buttonAdddept" type="submit" class="btn btn-Info" id="btnAdddept" value="Add Department"> </input> 
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			
        </div>
		</form>

</div>
</div>
</div>
</div>