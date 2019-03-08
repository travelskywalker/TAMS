<?php
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

$uid =$_GET["uid"];
$sql_edituser = "SELECT * FROM tbl_users WHERE uid = $uid";
$result_edituser = dbQuery($sql_edituser);

$sqldept = "SELECT deptcode, deptname FROM tbl_dept AS deptname";
$resultdept = dbQuery($sqldept); 
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

<title> Edit User </title>
<div class="container">
<form action="process/useradd.php?action=edit" method="post" name="EditUser" id="EditUser">
<center><h1>Edit User</h1></center>
<?php
while($chez = dbFetchAssoc($result_edituser)){
extract($chez);
?>
<center><table> 
 <tr> 
   <td><b>Employee ID</b></td><input type="hidden" name="uid" value="<?php echo $uid; ?>">
   <td> <input disabled class="form-control" name="empid" type="text" id="empid" size="40"  maxlength="40" value="<?php echo$empid;?>" required></td>
  </tr>
 <tr> 
   <td><b>User Name</b></td>
   <td> <input disabled class="form-control" name="uname" type="text" id="uname" size="40"  maxlength="40" value="<?php echo$uname;?>" required></td>
  </tr>
  <tr> 
   <td><b>Password</b></td>
   <td> <input class="form-control" name="pwd" type="password" id="pwd" size="40" maxlength="40" value="<?php echo$pwd;?>" required></td>
  </tr>
  <tr>
    <td><b>Email</b></td>
    <td><input class="form-control" name="email" type="email" id="email" size="40" maxlength="40" value="<?php echo$email;?>"required></td>
  </tr>
  <tr>
    <td><b>First Name</b></td>
    <td><input class="form-control" name="fname" type="text" id="fname" size="40" maxlength="50" value="<?php echo$fname;?>"required></td>
  </tr>
  <tr>
    <td><b>Last Name</b></td>
    <td><input class="form-control" name="lname" type="text" id="lname" size="40" maxlength="50" value="<?php echo$lname;?>"required></td>
  </tr>

   <tr>
    <td><b>Department</b></td>
    <td>
	<select class="form-control" name="deptcode" id="deptcode">
	<?php
	while($dept = dbFetchAssoc($resultdept)) {
		extract($dept);
	?>
	<option value="<?php echo $deptcode; ?>"><?php echo $deptname ?></option>

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
     <option value="user">USER</option>
	 </select>
	 </td>
	 </tr>
  </body>

  </table></center>
  </div>	  
		&nbsp;
        <p align="center"> 
        <input name="SaveEditUser" type="submit" class="button" value="Save"> </input> 
		 &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php?chez=users_view.php';">  
 </p>

<?php 
} 
?>		
   </body>