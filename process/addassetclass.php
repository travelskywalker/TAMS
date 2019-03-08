<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addclass();
		break;

	case 'delete' :
		deleteclass();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location:../index.php?chez=main.php');
}

function addclass()
{

$classcode = $_POST ["classcode"];
$classdesc = $_POST ["classdesc"];

$classdesc = ucwords ($classdesc);

$sql = "SELECT classcode FROM tbl_assetclass where classcode = '$classcode'";
$result = dbQuery($sql);

if (dbNumRows($result) == 1) {
	
	header ('Location:../index.php?chez=error/ecategory.php&category&error' . urlencode('Entered Asset Category or Asset Class Already Taken'));
	
} else {

$sql = "INSERT INTO tbl_assetclass (classcode, classdesc)
		VALUES ('$classcode', '$classdesc')";	

$result = dbQuery($sql) or die('Cannot add Category' . mysql_error());
		
header('Location:../index.php?chez=invparms.php');

}
}

/*Remove Class*/

function deletelass()
{
	if (isset($_GET['a_classid']) && (int)$_GET['a_classid'] > 0) {
		$a_classid = (int)$_GET['a_classid'];
	} else {
		header('../index.php?chez=category.php');
	}

	$sql = "DELETE FROM tbl_assetclass
	        WHERE a_classid = $a_classid";
			
	dbQuery($sql);
	 
	header('Location:../index.php?chez=category.php');
}

?>