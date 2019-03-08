<?php
require_once 'library/config.php';
require_once 'library/functions.php';

	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}

$asgnuserid =$_GET["asgnuserid"];
$sql_editemployee = "SELECT * FROM tbl_assignuser WHERE asgnuserid = '$asgnuserid'";
$result_editemployee = dbQuery($sql_editemployee);

$sqlbranch = "SELECT branchcode, branchname FROM tbl_branch AS branchname";
$resultbranch = dbQuery($sqlbranch); 

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

<title> Edit Employee </title>
<div class="container">
<form action="process/userasgnadd.php?action=edit" method="post" name="EditEmployee" id="EditEmployee">
<center><h1>Edit Employee</h1></center>
<?php
while($chez = dbFetchAssoc($result_editemployee)){
extract($chez);
?>
<center><table> 
 <tr> 
   <td><b>Employee ID</b></td><input type="hidden" name="asgnuserid" value="<?php echo $asgnuserid; ?>">
   <td> <input readonly class="form-control" name="empnum" type="text" id="empnum" size="40"  maxlength="40" value="<?php echo$empnum;?>" required></td>
  </tr>
 <tr> 
   <td><b>First Name</b></td>
   <td> <input class="form-control" name="asgn_fname" type="text" id="asgn_fname" size="40"  maxlength="40" value="<?php echo$asgn_fname;?>" required></td>
  </tr>
  <tr> 
   <td><b>Last Name</b></td>
   <td> <input class="form-control" name="asgn_lname" type="text" id="asgn_lname" size="40" maxlength="40" value="<?php echo$asgn_lname;?>" required></td>
  </tr>
  <tr>
    <td><b>Email Address</b></td>
    <td><input class="form-control" name="euemail" type="email" id="euemail" size="40" maxlength="40" value="<?php echo$euemail;?>"required></td>
  </tr>
  
  <tr>
    <td><b>Designation</b></td>
    <td><input class="form-control" name="position" type="text" id="position" size="40" maxlength="50" value="<?php echo$position;?>"required></td>
  </tr>

<?php 
} 
?>	
  
     <tr>
    <td><b>Branch</b></td>
    <td>
	<select class="form-control" name="branchname" id="branchname">
	<?php
  //branch of employee
   $userbranch = $branchname;
   
	while($branch = dbFetchAssoc($resultbranch)) {
		extract($branch);
	?>
	<option value="<?php echo $branchname; ?>" <?php if($userbranch == $branchname) echo "selected"; ?>><?php echo $branchname ?></option>

	<?php
	}
	?>
	</select>
	</td>
  </tr>
  
  </body>

  </table></center>
  </div>	  
		&nbsp;
        <p align="center"> 
        <input name="SaveEditUser" type="submit" class="btn btn-primary" value="Save"> </input> 
		 &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="btn btn-danger"  value="Cancel" onClick="window.location.href='index.php?chez=endusers_view.php';">  
 </p>
	
   </body>