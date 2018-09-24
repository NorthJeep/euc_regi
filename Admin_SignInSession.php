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
		$UserSignInSQL = 'SELECT * FROM tbl_r_config WHERE aes_decrypt(Username,"eucevent") ="'.$Username.'" AND aes_decrypt(Password,"eucevent") = "'.$Password.'" ';
		$UserSignIn = mysqli_query($euceventMysqli,$UserSignInSQL) or die (mysqli_error($euceventMysqli));
		if(mysqli_num_rows($UserSignIn) > 0)
		{
			while($row = mysqli_fetch_assoc($UserSignIn))
			{
				$ID = $row['User_ID'];
			}

			session_start();
			$_SESSION['LoggedIn'] = $ID;
			$header = 'Location: index_Admin.php?id='.$ID.'';
			header($header);

		}
		else
		{
			$header = 'Location: index.php';
			header($header);
			echo 'Wrong Username and Password';
		} 
	}
?>