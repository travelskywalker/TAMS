// JavaScript Document
function checkuser()
{
	with (window.document.frmAddUser) {
		if (isEmpty(txtUserName, 'Enter user name')) {
			return;
		} else if (isEmpty(txtPassword, 'Enter password')) {
			return;
		} else if (isEmpty(txtEmail, 'Enter Email')) {
			return;
		} else if (isEmpty(txtFname, 'Enter First name')) {
			return;
		} else if (isEmpty(txtLname, 'Enter Last name')) {
			return;
		}else {
			submit();
		}
	}
}