<?php
	include('config.php');
	session_start();

	$ID = $_POST['ID'];
	$FName = $_POST['FName'];
	$MName = $_POST['MName'];
	$LName = $_POST['LName'];
	$XName = $_POST['XName'];
	$Company = $_POST['Company'];
	$Contact = $_POST['Contact'];
	$Email = $_POST['Email'];
	$Flag = 0;

	// CHECK IF THERE IS EXISTING DATA ABOUT THE REGISTRANT

	$CheckSQL = 'SELECT * FROM tbl_t_registrant WHERE (First_Name = "'.$FName.'" AND 
														Middle_Name = "'.$MName.'" AND 
														Last_Name = "'.$LName.'" AND  
														Ext_Name = "'.$XName.'") OR
														Email = aes_encrypt("'.$Email.'","eucevent") ';
	$Check = mysqli_query($euceventMysqli,$CheckSQL) or die (mysqli_error($euceventMysqli));							
	if(mysqli_num_rows($Check) > 0)
	{
		while($row = mysqli_fetch_assoc($Check))
		{
			$RID = $row['Registrant_ID'];	
		}

		// UPDATE DETAILS
		$RegistrantUpdateSQL = 'UPDATE tbl_t_registrant SET Contact = aes_encrypt("'.$Contact.'","eucevent"), Email = aes_encrypt("'.$Email.'","eucevent"), Company = "'.$Company.'" WHERE Registrant_ID = '.$RID.' ';
		$RegistrantUpdate = mysqli_query($euceventMysqli,$RegistrantUpdateSQL) or die (mysqli_error($euceventMysqli));

		// CHECK IF REGISTRANT ALREADY REGISTERED

		$EventRegistrantSQL = 'SELECT 
										R.Registration_No,
										Reg.Registrant_ID,
										Reg.First_Name,
								        IFNULL(Reg.Middle_Name,"") AS Middle_Name,
								        Reg.Last_Name,
								        IFNULL(Reg.Ext_Name,"") AS Ext_Name,
								        E.Event_ID,
								        E.Event_Title
								FROM tbl_t_registration AS R
								INNER JOIN tbl_t_registrant AS Reg
									ON R.Registrant_ID = Reg.Registrant_ID
								INNER JOIN tbl_t_event AS E
									ON R.Event_ID = E.Event_ID
								WHERE Reg.Registrant_ID = '.$RID.'
								AND E.Event_ID = '.$ID.'';
		$EventRegistrantQuery = mysqli_query($euceventMysqli,$EventRegistrantSQL) or die (mysqli_error($euceventMysqli));							
		if(mysqli_num_rows($EventRegistrantQuery) > 0)
		{
			$Flag = 1;
			while($row3 = mysqli_fetch_assoc($EventRegistrantQuery))
			{
				$RegNo = $row3['Registration_No'];
			}
		}
		else
		{
			// REGISTER INTO EVENT
			$Flag = 0;
			$RegisterEventSQL = 'INSERT INTO tbl_t_registration (Event_ID,Registrant_ID,Date_Registered) VALUES ('.$ID.','.$RID.',CURRENT_DATE)';
			$RegisterEvent = mysqli_query($euceventMysqli,$RegisterEventSQL) or die (mysqli_error($euceventMysqli));
		}

		// echo 'OK';
		// $header = 'Location:/euc_regi/index_Cust.php?stat=2';
		// header($header);
	}

	else
	{
		// INSERT REGISTRANT DETAILS
		$Flag = 0;
		$RegisterSQL = 'INSERT INTO tbl_t_registrant (First_Name,Middle_Name,Last_Name,Ext_Name,Company,Contact,Email) VALUES ("'.$FName.'","'.$MName.'","'.$LName.'","'.$XName.'","'.$Company.'",aes_encrypt("'.$Contact.'","eucevent"),aes_encrypt("'.$Email.'","eucevent"))';
		$Register = mysqli_query($euceventMysqli,$RegisterSQL) or die (mysqli_error($euceventMysqli));

		// GET LAST ENTERED REGISTRANT ID

		$RegistrantIDSQL = 'SELECT * FROM tbl_t_registrant ORDER BY Registrant_ID DESC LIMIT 1';
		$RegistrantID = mysqli_query($euceventMysqli,$RegistrantIDSQL) or die (mysqli_error($euceventMysqli));
		if(mysqli_num_rows($RegistrantID) > 0)
		{
			while($row = mysqli_fetch_assoc($RegistrantID))
			{
				$RID = $row['Registrant_ID'];	
			}
		}
		
		// INSERT REGISTRATION

		$RegisterEventSQL = 'INSERT INTO tbl_t_registration (Event_ID,Registrant_ID,Date_Registered) VALUES ('.$ID.','.$RID.',CURRENT_DATE)';
		$RegisterEvent = mysqli_query($euceventMysqli,$RegisterEventSQL) or die (mysqli_error($euceventMysqli));

		// echo 'OK';
		// $header = 'Location:/euc_regi/index_Cust.php?stat=1';
		// header($header);
	}

	if($Flag == 0)
	{
		$RegistrationIDSQL = 'SELECT MAX(Registration_No) AS Reg_ID FROM tbl_t_registration';
		$RegistrationID = mysqli_query($euceventMysqli,$RegistrationIDSQL) or die (mysqli_error($euceventMysqli));
		if(mysqli_num_rows($RegistrationID) > 0)
		{
			while($row = mysqli_fetch_assoc($RegistrationID))
			{
				$RegNo = $row['Reg_ID'];	
			}
		}
		$Output = "Registration_Print.php?R=".$RegNo."";
		echo $Output;
	}
	else
	{
		$Output = "Registration_Print.php?R=".$RegNo."";
		echo $Output;
	}
?>