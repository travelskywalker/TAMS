<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addusers();
		break;
		
	case 'edit':
		editusers();
		break;

	case 'delete' :
		deleteusers();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location:../index.php?chez=main.php');
}

function addusers()
{
$empid = $_POST ["empid"];
$uname = $_POST ["uname"];
$pwd = 	$_POST ["pwd"];
$email = $_POST ["email"];
$fname = $_POST ["fname"];
$lname = $_POST ["lname"];
$deptcode = $_POST ["deptcode"];
$branchname = $_POST ["branchname"];
$utype = $_POST ["utype"];

$fname = ucwords ($fname);
$lname = ucwords ($lname);

/* check credentials*/ 
$sqluname = " SELECT uname FROM tbl_users WHERE uname = '$uname'";
$resultuname = dbQuery($sqluname);
	
$sqlempid = " SELECT empid FROM tbl_users WHERE empid = '$empid'";
$resultempid = dbQuery($sqlempid);

if (dbNumRows($resultuname) == 1) {

	header ('Location:../index.php?chez=error/eusers_view.php&adduser&error' . urlencode('Username taken. Please choose another one'));
}

elseif (dbNumRows($resultempid) == 1) {
	
	header ('Location:../index.php?chez=error/eusers_view.php&error' . urlencode('Username taken. Please choose another one'));


}
else {

/* If No error*/
	
$sql = "INSERT INTO tbl_users (empid,uname, pwd, email, fname, lname, deptcode, branchname, utype)
		VALUES ('$empid','$uname', '$pwd', '$email','$fname', '$lname', '$deptcode', '$branchname',UPPER ('$utype'))";
		
$result = dbQuery($sql) or die('Cannot add User' . mysql_error());
		
header('Location:../index.php?chez=users_view.php');
}
}

/* Edit Users*/

function editusers()
{
$uid = $_POST["uid"];
$uname = $_POST ['uname'];
$pwd = 	$_POST ['pwd'];
$email = $_POST ['email'];
$fname = $_POST ['fname'];
$lname = $_POST ['lname'];
$deptcode = $_POST ['deptcode'];
$utype = $_POST ['utype'];

$fname = ucwords ($fname);
$lname = ucwords ($lname);

/* check credentials*/ 
$sqledituname = "SELECT uname FROM tbl_users WHERE uname = '$uname'";
$resultedituname = dbQuery($sqledituname);

if (dbNumRows($resultedituname) == 1) {
	
	header ('Location:../index.php?chez=error/eusers_view.php&adduser&error' . urlencode('Username taken. Please choose another one'));
	
}
else {
	
$sql = "UPDATE tbl_users SET 
		pwd='$pwd', 
		email='$email',
		fname='$fname',
		lname='$lname', 
		deptcode='$deptcode', 
		utype= UPPER('USER')
		where uid = $uid";
		
$result = dbQuery($sql);
		
header('Location:../index.php?chez=users_view.php');
}
}
	
/*Delete Users*/

function deleteusers()
{
	if (isset($_GET['uid']) && (int)$_GET['uid'] > 0) {
		$uid = (int)$_GET['uid'];
	} else {
		header('index.php?chez=users_view.php');
	}

	$sql = "DELETE FROM tbl_users
	        WHERE uid = $uid";
			
	dbQuery($sql);
	 
	header('Location:../index.php?chez=users_view.php');

}
?>