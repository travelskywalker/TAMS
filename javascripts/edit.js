function editusers(uid)
{
	if (confirm('Do you want to Edit this user?')) {
		window.location.href = 'edituser.php?action=edituser&uid=' + uid;
	}
}


function editemployee(asgnuserid)
{
	if (confirm('Do you want to Edit this Employee?')) {
		window.location.href = 'editemployee.php?action=editemployee&asgnuserid=' + asgnuserid;
	}
}

function editcategory(catid)
{
	if (confirm('Do you want to Edit this Category?')) {
		window.location.href = 'editcat.php?action=editcategory&catid=' + catid;
	}
}