<?php
	if(!$_SESSION['tams_user_id']){
	header("location:index.php");
	exit;
	}
?>
<head>
<?php include_once("include/bootstrap.php");?>
</head>
	
<style>	
body { margin-top:20px; background-color:#EEEEEE;}
</style>

<body>
<div class="container">
<?php include_once("include/navigation.php");?>
</div>	

<div class="container">
<table height = "10%" width="20%" cellspacing="0" cellpadding="0">
  <tr>
    <td>

<p>&nbsp;</p>

<form action="/index.php?a=adduser.php" method="post">

Lastname: <input class = "form-control" type="text" name="lname"><br>
Firstname: <input class = "form-control" type="text" name="fname"><br> 
E-mail: <input class = "form-control" type="email" name="email"><br>
Username: <input class = "form-control" type="text" name="uname"><br>
Password: <input class = "form-control" type="password" name="pass1"><br>
Confirm Password: <input class = "form-control" type="password" name="pass2"><br>
<input type="submit" value="Register New User">

</form>
	</td>
  </tr>
</table>
</div>
</body>