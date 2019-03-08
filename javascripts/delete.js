function deleteArea(areaid)
{
	if (confirm('Are you sure you want to Delete this Area?')) {
		window.location.href = 'process/addarea.php?action=delete&areaid=' + areaid;
	}
}

function deleteBranch(branchid)
{
	if (confirm('Are you sure you want to Delete this Branch?')) {
		window.location.href = 'process/addbranch.php?action=delete&branchid=' + branchid;
	}
}

function deleteOrg(deptid)
{
	if (confirm('Are you sure you want to Delete this Department?')) {
		window.location.href = 'process/addorg.php?action=delete&deptid=' + deptid;
	}
}

function deleteEU(asgnuserid)
{
	if (confirm('Are you sure you want to Delete this Employee?')) {
		window.location.href = 'process/userasgnadd.php?action=delete&asgnuserid=' + asgnuserid;
	}
}

function deleteusers(uid)
{
	if (confirm('Are you sure you want to Delete this User?')) {
		window.location.href = 'process/useradd.php?action=delete&uid=' + uid;
	}
}


function deletecat(catid)
{
	if (confirm('Are you sure you want to Delete this Category')) {
		window.location.href = 'process/addcat.php?action=delete&catid=' + catid;
	}
}

function deleteclass(a_classid)
{
	if (confirm('Are you sure you want to Delete this Asset Class')) {
		window.location.href = 'process/deleteclass.php?action=delete&a_classid=' + a_classid;
	}
}