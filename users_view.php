<?php
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

if (isset($_GET['uid']) && (int)$_GET['uid'] >= 0) {
	$uid= (int)$_GET['uid'];
	$queryString = "&uid=$uid";
} else {
	$uid = 0;
	$queryString = '';
}


$sql = "select * from tbl_users JOIN tbl_dept ON tbl_users.deptcode=tbl_dept.deptcode where utype ='USER' order by lname";
$result = dbQuery ($sql);

?>
<head>
<script src="javascripts/clock.js"></script>
<script src="javascripts/delete.js"></script>
<script src="javascripts/edit.js"></script>
<script src="javascripts/intgeronly.js"></script>
</head>

<style>
body { margin-top:20px; background-color:#EEEEEE;}
thead { font-family: arial;background-color: #ddccee;}

#userview {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#userview td, #userview th {
    border: 1px solid #090a0a;
    padding: 8px;
}

#userview tr:nth-child(even){background-color: #d4d6d8;}

#userview tr:hover {background-color: #e8a4ce;}

#userview th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #0099cc;
    color: white;
}
</style>

<body>

<title>TAMS User Management</title>
<div class="container">
<?php include_once("include/navigation.php");?>
</div>
<p>&nbsp;</p>

<div class="container">

<h2>User Management</h2>
<p><img src="images/users.png" height="100" width="100" align="left"/> </p> 
<strong>This page allow an administrator to manage the users in the system.</strong>
<p>
It essentially supplies a list of users defined in the system. The user names are linked to a 
page where you can change the user's password.
</p>
<p>&nbsp;</p>

<form action="process/useradd.php?action=add" method="post" name="AddUser" id="AddUser">
  <div class="container">
  <div class="table-responsive-sm">
    <table id="userview">
    <thead>
      <tr>
		<th>Employee ID</th>
		<th>Full name</th>
		<th>User name</th>
        <th>Email Address</th>
		<th>Department</th>
		<th>Branch</th>
        <th>User type</th>
		<th>Delete / Edit</th>
		
      </tr>
	  </thead>
	  </div>
	
	<?php
	while($row = dbFetchAssoc($result)) {
	extract($row);
	?>
	
	<td><?php echo $empid; ?></td>
	<td><?php echo ucfirst($lname.", ".$fname); ?></td>
	<td><?php echo $uname; ?></td>
   <td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
      <td><?php echo $deptname; ?></td>
	  <td><?php echo $branchname; ?></td>
	  <td><?php echo $utype; ?></td>
	  <td> <a  style="font-weight:normal;"  href="javascript:deleteusers(<?php echo $uid; ?>);">	  
	  Delete</a>/<a  style="font-weight:normal;" href="javascript:editusers(<?php echo $uid; ?>);">
	  
	  Edit</a></td>
     </tr>
	 
	 <?php
	}
	?>
  </table>
  </div><br>

  
    <!-- Button to Open the Modal -->
<center>  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser">
    Add New Users
  </button> </center>

  <!-- The Modal -->
  <div class="modal fade" id="adduser">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->

<?php

$sql = "SELECT deptcode, deptname FROM tbl_dept AS deptname";
$result = dbQuery($sql); 

$sql1 = "SELECT * FROM tbl_assignuser";
$result1 = dbQuery($sql); 
?>

<div class="modal-body">
<table>
 
  <tr> 
   <td><b>Employee ID</b></td>
   <td> <input class="form-control" name="empid" type="text" id="empid" size="6" maxlength="6" onKeyUp="checkNumber(this);" required ></td>
  </tr>
 <tr> 
   <td><b>User Name</b></td>
   <td> <input class="form-control" name="uname" type="text" id="uname" size="40" maxlength="40" required ></td>
  </tr>
  <tr> 
   <td><b>Password</b></td>
   <td> <input class="form-control" name="pwd" type="password" id="pwd" size="40" maxlength="40" required></td>
  </tr>
  <tr>
    <td><b>Email</b></td>
    <td><input class="form-control" name="email" type="email" id="email" size="40" maxlength="40" required></td>
  </tr>
  <tr>
    <td><b>First Name</b></td>
    <td><input class="form-control" name="fname" type="text" id="fname" size="40" maxlength="50" required></td>
  </tr>
  <tr>
    <td><b>Last Name</b></td>
    <td><input class="form-control" name="lname" type="text" id="lname" size="40" maxlength="50" required></td>
  </tr>
  <tr>
    <td><b>Department</b></td>
    <td>
	<select class="form-control" name="deptcode" id="deptcode">
	<?php
	while($row = dbFetchAssoc($result)) {
		extract($row);
	?>
	<option value="<?php echo $deptcode; ?>"><?php echo $deptname ?></option>

	<?php
	}
	
	?>
	</select>
	</td>
  </tr>
  
 <?php

$sql1 = "SELECT branchcode, branchname FROM tbl_branch AS branchname";
$result1 = dbQuery($sql1); 
?>
 
  <tr>
    <td><b>Branch</b></td>
    <td>
	<select class="form-control" name="branchname" id="branchname">
	<?php
	while($row = dbFetchAssoc($result1)) {
		extract($row);
	?>
	<option value="<?php echo $branchname; ?>"><?php echo $branchname ?></option>

	<?php
	}
	?>
	</select>
	</td>
  </tr>
  
   <tr>
    <td><b>User Type</b></td>
    <td>
	<select class="form-control" name="utype" id="utype">
	 <option value="admin">ADMIN</option>
     <option value="user">USER</option>
	 </select>
	 </td>
	 </tr>
  
 </table>
        </div>
        
        <!-- Modal footer -->
		<form id ="btnAdd">
        <div class="modal-footer">
        <input name="buttonAddUser" type="submit" class="btn btn-Info" value="Add User"> </input> 
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			
        </div>
		</form>
        
      </div>
    </div>
  </div>
   
</div>
	
</body>
