<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addBranch();
		break;

	case 'delete' :
		deleteBranch();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location:../index.php?chez=main.php');
}

function addBranch()
{
$branchname = $_POST ["branchname"];
$branchcode = $_POST ["branchcode"];
$arbrcode = $_POST ["arbrcode"];

$branchname = ucwords ($branchname);

$sql = " SELECT branchcode FROM tbl_branch WHERE branchcode = '$branchcode'";
$result = dbQuery($sql);

if (dbNumRows($result) == 1) {
	
	header ('Location:../index.php?chez=error/ebranchparameters.php&addemp&error' . urlencode('Branch Code Already Taken'));
	
} else {

$sql = "INSERT INTO tbl_branch (branchname, branchcode, areacode)
		VALUES ('$branchname', '$branchcode', '$arbrcode')";
			
$result = dbQuery($sql) or die('Cannot add Branch' . mysql_error());
		
header('Location:../index.php?chez=branchparameters.php');

}
}
/*Remove branch*/

function deleteBranch()
{
	if (isset($_GET['branchid']) && (int)$_GET['branchid'] > 0) {
		$branchid = (int)$_GET['branchid'];
	} else {
		header('index.php?chez=branchparameters.php');
	}

	$sql = "DELETE FROM tbl_branch 
	        WHERE branchid = $branchid";
			
	dbQuery($sql);
	header('Location:../index.php?chez=branchparameters.php');

}
?>