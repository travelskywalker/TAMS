<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addarea();
		break;

	case 'delete' :
		deletearea();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location:../index.php?chez=main.php');
}

function addarea()
{
$areaname = $_POST ["areaname"];
$areacode = 	$_POST ["areacode"];

$areaname = ucfirst ($areaname);

$sql = "SELECT areacode FROM tbl_area where areacode = '$areacode'";
$result = dbQuery($sql);

if (dbNumRows($result) == 1) {
	
	header ('Location:../index.php?chez=error/eareaparameters.php&area&error' . urlencode('Area Code Already Taken'));
	
} else {

$sql = "INSERT INTO tbl_area (areaname, areacode)
		VALUES ('$areaname', '$areacode')";
		
$result = dbQuery($sql) or die('Cannot add area' . mysql_error());
		
header('Location:../index.php?chez=areaparameters.php');

}
}
/*Remove Area*/

function deletearea()
{
	if (isset($_GET['areaid']) && (int)$_GET['areaid'] > 0) {
		$areaid = (int)$_GET['areaid'];
	} else {
		header('../index.php?chez=areaparameters.php');
	}

	$sql = "DELETE FROM tbl_area
	        WHERE areaid = $areaid";
			
	dbQuery($sql);
	 
	header('Location:../index.php?chez=areaparameters.php');
}

?>