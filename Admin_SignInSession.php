<?php
	include('config.php');
	$Username = $_POST['username'];
	$Password = $_POST['password'];

	if(empty($Username) === true || empty($Password) === true)
	{
		echo 'You need to enter a username and password';
	}
	else
	{
		$UserSignInSQL = 'SELECT * FROM tbl_r_config WHERE Username ="'.$Username.'" AND Password = "'.$Password.'" ';
		$UserSignIn = mysqli_query($euceventMysqli,$UserSignInSQL) or die (mysqli_error($euceventMysqli));
		if(mysqli_num_rows($UserSignIn) > 0)
		{
			while($row = mysqli_fetch_assoc($UserSignIn))
			{
				$ID = $row['User_ID'];
			}
			echo 'Login Successful';

			session_start();
			$_SESSION['LoggedIn'] = $ID;
			$header = 'Location:/euc_regi/index_Admin.php?id='.$ID.'';
			header($header);

		}
		else
		{
			echo 'Wrong Username and Password';
		} 
	}
?>