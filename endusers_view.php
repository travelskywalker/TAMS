<?php
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

if (isset($_GET['asgnuserid']) && (int)$_GET['asgnuserid'] >= 0) {
	$asgnuserid= (int)$_GET['asgnuserid'];
	$queryString = "&asgnuserid=$asgnuserid";
} else {
	$asgnuserid = 0;
	$queryString = '';
}

$sql = "select * from tbl_assignuser order by empnum";
$result = dbQuery ($sql);

?>
<head>
<script src="javascripts/clock.js"></script>
<script src="javascripts/delete.js"></script>
<script src="javascripts/edit.js"></script>
<script src="javascripts/intgeronly.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></script>
<script src="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script> $(document).ready(function() {
    $('#euserview').DataTable();
} );	</script>

</head>

<style>
body { margin-top:20px; background-color:#EEEEEE;}
thead { font-family: arial;background-color: #ddccee;}

#euserview {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#euserview td, #euserview th {
    border: 1px solid #090a0a;
    padding: 8px;
}

#euserview tr:nth-child(even){background-color: #d4d6d8;}

#euserview tr:hover {background-color: #e8a4ce;}

#euserview th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #0099cc;
    color: white;
}
</style>

<body>

<title>TAMS Employee List</title>
<div class="container">
<?php include_once("include/navigation.php");?>
</div>
<p>&nbsp;</p>

  <div class="container">
<form action="process/userasgnadd.php?action=add" method="post" name="AddEUser" id="AddEUser">

<h2>List of Employees</h2>
<p><img src="images/users.png" height="100" width="100" align="left"/> </p> 
<strong>This page allow an administrator to add employees for assigning of Assets.</strong>
<p>

</p>
<p>&nbsp;</p>

  <div class="container">
   <div class="table-responsive-sm">
    <table id="euserview">
    <thead>
      <tr>
		<th>Employee Number</th>
		<th>Full Name</th>
        <th>Email Address</th>
		<th>Branch</th>
		<th>Department</th>
		<th>Delete / Edit</th>
		
      </tr>
	  </thead>
	  </div>
	
	<?php
	while($row = dbFetchAssoc($result)) {
	extract($row);
	?>
	
	<td><?php echo $empnum; ?></td>
	<td><?php echo ucfirst($asgn_lname.", ".$asgn_fname); ?></td>
   <td><a href="mailto:<?php echo $euemail; ?>"><?php echo $euemail; ?></a></td>
      <td><?php echo $branchname; ?></td>
	  <td><?php echo $deptname; ?></td>
	  <td> <a  style="font-weight:normal;" href="javascript:deleteEU(<?php echo $asgnuserid; ?>);">
	  
	  Delete</a>/<a  style="font-weight:normal;" href="javascript:editemployee(<?php echo $asgnuserid; ?>);">
	  
	  Edit</a></td>
     </tr>
	 
	 <?php
	}
	?>
  </table>
  </div><br>


    <!-- Button to Open the Modal -->
	
		
<center>  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser">
    Add Employee
  </button>  
  <button class="btn btn-primary" onclick="myFunction()">Print this page</button>
		<script>
		function myFunction() {
		window.print();
		}
		</script>
		
  </center>

  <!-- The Modal -->
  <div class="modal fade" id="adduser">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">New Employee</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->

<?php

$sqldept = "SELECT deptname FROM tbl_dept AS deptname";
$resultdept = dbQuery($sqldept); 

$sqlbranch = "SELECT branchname FROM tbl_branch";
$resultbranch = dbQuery ($sqlbranch);
?>

<div class="modal-body">

<table>
 
 <tr> 
   <td><b>Employee Number</b></td>
   <td> <input class="form-control" name="empnum" type="text" id="empnum" size="40" maxlength="6" onKeyUp="checkNumber(this);" required ></td>
  </tr>
  <tr> 
   <td><b>First Name</b></td>
   <td> <input class="form-control" name="asgn_fname" type="text" id="asgn_fname" size="40" maxlength="40" required></td>
  </tr>
  <tr>
    <td><b>Last Name</b></td>
    <td><input class="form-control" name="asgn_lname" type="text" id="asgn_lname" size="40" maxlength="40" required></td>
  </tr>
  <tr>
    <td><b>Email Address</b></td>
    <td><input class="form-control" name="euemail" type="email" id="euemail" size="40" maxlength="50" required></td>
  </tr>
  <tr>
    <td><b>Department</b></td>
    <td>
	<select class="form-control" name="deptname" id="deptname">
	<?php
	while($rowdept = dbFetchAssoc($resultdept)) {
		extract($rowdept);
	?>
	<option value="<?php echo $deptname; ?>"><?php echo $deptname ?></option>
	
	<?php
	}
	?>
	</select>
	</td>
  </tr>
  
  <tr>
  	<td><b>Branch</b></td>
    <td>
	<select class="form-control" name="branchname" id="branchname">
	<?php
	while($rowbranch = dbFetchAssoc($resultbranch)) {
		extract($rowbranch);
	?>
	<option value="<?php echo $branchname; ?>"><?php echo $branchname ?></option>
	
	<?php
	}
	?>
	</select>
	</td>
	</tr>
  
   <tr> 
   <td><b>Designation</b></td>
   <td> <input class="form-control" name="position" type="text" id="position" size="40" maxlength="25" required ></td>
  </tr>
  
 </table>
        </div>
        
        <!-- Modal footer -->
		
		<form id ="btnAdd">
        <div class="modal-footer">
        <input name="buttonAddUser" type="submit" class="btn btn-Info" value="Add Employee"> </input> 
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			
        </div>
		</form>
        
      </div>
    </div>
  </div>
  </div>

  
</div>
</body>
