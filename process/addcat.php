<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addcat();
		break;
		
	case 'edit' :
		editcat();
		break;
		
	case 'delete' :
		deletecat();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location:../index.php?chez=main.php');
}

function addcat()
{
$assetcat = $_POST ["assetcat"];
$type = $_POST ["type"];
$typenew = $_POST ["typenew"];
$classcode = $_POST ["classcode"];

$assetcat = ucwords ($assetcat);

//query to select duplicate category
$sql = "SELECT assetcat FROM tbl_invcat WHERE assetcat = '$assetcat'";
$result = dbQuery($sql);

if (dbNumRows($result) == 1) {
	
	header ('Location:../index.php?chez=error/ecategory.php&addtype&error' . urlencode('Category Already Taken'));

} else {
	
if ($typenew == NULL)	{
	
$sql = "INSERT INTO tbl_invcat (assetcat, type, classcode)
		VALUES ('$assetcat', '$type', '$classcode')";
$result = dbQuery($sql) or die('Cannot add Category' . mysql_error());

header('Location:../index.php?chez=category.php');

} else {

//query to select duplicate type
$sql = "SELECT type FROM tbl_invcat WHERE type = '$typenew'";
$result = dbQuery($sql);

if (dbNumRows($result) == 1) {
	
	header ('Location:../index.php?chez=error/ecategory.php&addtype&error' . urlencode('Type Already Taken'));
} else {

$sql = "INSERT INTO tbl_invcat (assetcat, type, classcode)
		VALUES ('$assetcat', '$typenew', '$classcode')";
$result = dbQuery($sql) or die('Cannot add Category' . mysql_error());

header('Location:../index.php?chez=category.php');
}
}
}
}
/* Edit Category*/

function editcat()
{
$catid = $_POST["catid"];
$assetcat = $_POST ['assetcat'];
$type = 	$_POST ['type'];
	
$sql = "UPDATE tbl_invcat SET 
		assetcat = ('$assetcat'),
		type = ('$type')
		where catid = $catid";
		
$result = dbQuery($sql);
		
header('Location:../index.php?chez=category.php');
}


function deletecat()
{
	if (isset($_GET['catid']) && (int)$_GET['catid'] > 0) {
		$catid = (int)$_GET['catid'];
	} else {
		header('../index.php?chez=category.php');
	}

	$sql = "DELETE FROM tbl_invcat
	        WHERE catid = $catid";
			
	dbQuery($sql);
	 
	header('Location:../index.php?chez=category.php');
}


?>