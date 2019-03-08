<?php
require_once '../library/config.php';
require_once '../library/functions.php';


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'search' :
		search();
		break;

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location:../index.php?chez=main.php');
}
function search()
{

$type = (int)$_POST ["type"];

	if($type == 1){
	
	header ('Location:../index.php?chez=reports/HardwareAssets.php&VIEW' . urlencode('HardwareSummary'));
}
	if($type == 2){
	
	header ('Location:../index.php?chez=reports/SoftwareAssets.php&VIEW' . urlencode('SoftwareLists'));

}

	if($type == 4){
	
	header ('Location:../index.php?chez=reports/disposedasset.php&VIEW' . urlencode('DisposedAssets'));

}
}
?>