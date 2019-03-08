<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addEU();
		break;
		
	case 'edit' :
		editEU();
		break;

	case 'delete' :
		deleteEU();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location:../index.php?chez=main.php');
}

function addEU()
{
$empnum = $_POST ["empnum"];
$asgn_fname = $_POST ["asgn_fname"];
$asgn_lname = $_POST ["asgn_lname"];
$euemail = $_POST ["euemail"];
$deptname = $_POST ["deptname"];
$branchname = $_POST ["branchname"];
$position = $_POST ["position"];

$asgn_fname = ucwords($asgn_fname);
$asgn_lname = ucwords ($asgn_lname);

$sql = " SELECT empnum FROM tbl_assignuser WHERE empnum = '$empnum'";
$result = dbQuery($sql);

if (dbNumRows($result) == 1) {
	
	header ('Location:../index.php?chez=error/eendusers_view.php&addemp&error' . urlencode('Employee Number Already Taken'));
	
} else {

$sql = "INSERT INTO tbl_assignuser (empnum, asgn_fname, asgn_lname, euemail, deptname, branchname, position)
		VALUES ('$empnum', '$asgn_fname', '$asgn_lname', '$euemail', '$deptname', '$branchname','$position')";
		
$result = dbQuery($sql) or die('Cannot add EndUser' . mysql_error());
		
header('Location:../index.php?chez=endusers_view.php');

}
}

/* Edit Employee*/

function editEU()
{
	
$asgnuserid = $_POST["asgnuserid"];
$asgn_fname = $_POST ["asgn_fname"];
$asgn_lname = $_POST ["asgn_lname"];
$euemail = $_POST ["euemail"];
$position = $_POST ["position"];
$branchname = $_POST ["branchname"];


$asgn_fname = ucwords($asgn_fname);
$asgn_lname = ucwords ($asgn_lname);
$position = ucwords ($position);
$branchname = ucwords ($branchname);
	
$sql = "UPDATE tbl_assignuser SET 
		asgn_fname='$asgn_fname', 
		asgn_lname='$asgn_lname',
		euemail='$euemail',
		position='$position',
		branchname='$branchname'
		where asgnuserid = '$asgnuserid'";
		
		$asgn_fname = ucwords($asgn_fname);
		$asgn_lname = ucwords ($asgn_lname);
		$position = ucwords ($position);
		$branchname = ucwords ($branchname);
		
$result = dbQuery($sql);
		
header('Location:../index.php?chez=endusers_view.php');
}


/*Remove Area*/

function deleteEU()
{
	if (isset($_GET['asgnuserid']) && (int)$_GET['asgnuserid'] > 0) {
		$asgnuserid = (int)$_GET['asgnuserid'];
	} else {
		header('index.php?chez=endusers_view.php');
	}

	$sql = "DELETE FROM tbl_assignuser
	        WHERE asgnuserid = $asgnuserid";
			
	dbQuery($sql);
	 
	header('Location:../index.php?chez=endusers_view.php');

}
?>