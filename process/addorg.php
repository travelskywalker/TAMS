<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addOrg();
		break;

	case 'delete' :
		deleteOrg();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location:../index.php?chez=main.php');
}

function addOrg()
{
$deptname = $_POST ["deptname"];
$deptcode = 	$_POST ["deptcode"];

$deptname = ucwords ($deptname);

$sql = " SELECT deptcode FROM tbl_dept WHERE deptcode = '$deptcode'";
$result = dbQuery($sql);

if (dbNumRows($result) == 1) {
	
	header ('Location:../index.php?chez=error/edeptparameters.php&addemp&error' . urlencode('Department Code Already Taken'));
	
} else {


$sql = "INSERT INTO tbl_dept (deptname, deptcode)
		VALUES ('$deptname', '$deptcode')";
		
$result = dbQuery($sql) or die('Cannot add Area' . mysql_error());
		
header('Location:../index.php?chez=deptparameters.php');

}
}
/*Remove Organization*/

function deleteOrg()
{
	if (isset($_GET['deptid']) && (int)$_GET['deptid'] > 0) {
		$deptid = (int)$_GET['deptid'];
	} else {
		header('index.php?chez=deptparameters.php');
	}

	$sql = "DELETE FROM tbl_dept
	        WHERE deptid = $deptid";
			
	dbQuery($sql);
	header('Location:../index.php?chez=deptparameters.php');

}
?>