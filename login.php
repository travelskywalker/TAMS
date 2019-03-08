<?php
require_once 'library/config.php';
require_once 'library/functions.php';

$errorMessage = '&nbsp;';

if (isset($_POST['tamsUserName'])) 
if (isset($_POST['tamsPassword'])) {
	$result = doLogin();
	
	if ($result != '') {
		$errorMessage = $result;
	}
}

?>
<html>
<title>TAMS</title>

<style>
body { margin-top:20px; background-color:#EEEEEE; background-image: url("images/bg.jpg") }
</style>


<body>

<div>
<?php include_once("include/header.php");?>
</div>

<center><table height = "30%" width="60%" cellspacing="0" cellpadding="0"></center>
  <tr>
    <td>
	<center><img src="images/Admin.png" height="220" width="250" />	</td><center>
    <td>
	<h2 style="font-size:20px;">User Login</h2>
		<form method="post" name="frmLogin" id="frmLogin">
		 <div align="center"><?php echo $errorMessage; ?></div>
         <strong>User Name :</strong> <input class = "form-control" name="tamsUserName" type="text" id="tamsUserName" maxlength="20" placeholder="enter username"><br/>
         <strong>Password : </strong><input class = "form-control" name="tamsPassword" type="password"  id="tamsPassword" maxlength="20" placeholder="enter password"><br/>
         <br/>  
		 <div><div align="center"><input name="btnLogin" type="submit" id="btnLogin" value="Login" class="button">
				<input name="btnReset" type="reset" id="btnReset" value="Clear" class="button"></div></div>

      </form>

	</td>
  </tr>
</table>

</body>
</html>
