<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';


switch ($action) {
	
	case 'update' :
		updateassetstatus();
		break;
	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location:../index.php?chez=usermain.php');
}

function updateassetstatus()
{
	$assignid = $_POST["assignid"];
	$remarks = $_POST["remarks"];

	$sql = "UPDATE tbl_assetassign SET 
		remarks = '$remarks'
		where assignid = '$assignid'";
	$result = dbQuery($sql);
	
	header('Location:../index.php?chez=reports/userAssetStatus.php');

}


?>