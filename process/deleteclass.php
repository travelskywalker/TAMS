<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	

	case 'delete' :
		deleteclass();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location:../index.php?chez=main.php');
}

function deleteclass()
{
	if (isset($_GET['a_classid']) && (int)$_GET['a_classid'] > 0) {
		$a_classid = (int)$_GET['a_classid'];
	} else {
		header('index.php?chez=invparms.php');
	}
	
//with bug please fix the delete button. nabubura din category pag dinelete ang asset class.. lagyan ng error message bago mag delete kung existing

	$sql = "select * from tbl_invcat JOIN tbl_assetclass ON tbl_invcat.classcode=tbl_assetclass.classcode where a_classid = '$a_classid'";
	$result = dbQuery($sql);

if (dbNumRows($result) == 1) {
	
	header ('Location:../index.php?chez=error/ecategory.php&addtype&error' . urlencode('Department Code Already Taken'));

}
	
	$sql = "DELETE FROM tbl_assetclass
	        WHERE a_classid = $a_classid";
			
	dbQuery($sql);
	 
	header('Location:../index.php?chez=invparms.php');

}
?>