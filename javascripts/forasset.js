function updateasset(assetid)
{
	if (confirm('Do you want to edit?')) {
		window.location.href = 'editasset.php?action=updateasset&assetid=' + assetid;
	}
}

function deleteasset(assetid)
{
	if (confirm('Do you want to Delete this Asset?')) {
		window.location.href = 'process/assetadd.php?action=delete&assetid=' + assetid;
	}
}

function restore(assetid)
{
	if (confirm('Do you want to Restore this Asset?')) {
		window.location.href = 'process/assetadd.php?action=restore&assetid=' + assetid;
	}
}

function updateassetstatus(assignid)
{
	if (confirm('Update the Status?')) {
		window.location.href = 'updateasset.php?action=updateassetstatus&assignid=' + assignid;
	}
}