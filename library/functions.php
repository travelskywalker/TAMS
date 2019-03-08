<?php
function checkUser()

{
	if (!isset($_SESSION['tams_user_id'])) {
		header('location:index.php');
		exit;
	}
}
/*
	Login a user
*/		
function doLogin()
{

	
	$userName = $_POST['tamsUserName'];
	$password = $_POST['tamsPassword'];
	
		$sql = "SELECT *
		        FROM tbl_users 
				WHERE uname = '$userName' AND pwd = '$password'";
		$result = dbQuery($sql);
	
		if (dbNumRows($result) == 1) {
			while($tbl_users = dbFetchAssoc($result)) {
			
			
			$utype = $tbl_users ['utype'];
			$uid = $tbl_users ['uid'];

       if($utype=="ADMIN"){
                $_SESSION['tams_user_name'] =  $tbl_users['uname'];
                $_SESSION['tams_user_id'] = $tbl_users['uid'];
				 $_SESSION['tams_user_type'] =  $tbl_users['utype'];
				 $_SESSION['tams_first_name'] = $tbl_users['fname'];
	   //	   }
			header("location: index.php?chez=main.php");
			//exit();
		}	
		else{
           $_SESSION['tams_user_name'] =  $tbl_users['uname'];
                $_SESSION['tams_user_id'] = $tbl_users['uid'];
				 $_SESSION['tams_user_type'] =  $tbl_users['utype'];
				 $_SESSION['tams_first_name'] = $tbl_users['fname'];
		 	header("location:index.php?chez=usermain.php");
            }
	

		}		
			
	}
	}





?>