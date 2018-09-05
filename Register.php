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
	$Payment = $_POST['Payment'];

	// CHECK IF THERE IS EXISTING DATA ABOUT THE REGISTRANT

	$CheckSQL = 'SELECT * FROM tbl_t_registrant WHERE (First_Name = "'.$FName.'" AND 
														Middle_Name = "'.$MName.'" AND 
														Last_Name = "'.$LName.'" AND  
														Ext_Name = "'.$XName.'") OR
														Email = aes_decrypt("'.$Email.'","eucevent") ';
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

		// REGISTER INTO EVENT

		$RegisterEventSQL = 'INSERT INTO tbl_t_registration (Event_ID,Registrant_ID,Date_Registered,Payment_Type) VALUES ('.$ID.','.$RID.',CURRENT_DATE,"'.$Payment.'")';
		$RegisterEvent = mysqli_query($euceventMysqli,$RegisterEventSQL) or die (mysqli_error($euceventMysqli));

		// echo 'OK';
		// $header = 'Location:/euc_regi/index_Cust.php?stat=2';
		// header($header);
	}

	else
	{
		// INSERT REGISTRANT DETAILS

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
		else
		{
			// echo 'NO DATA';
		}
		

		// INSERT REGISTRATION

		$RegisterEventSQL = 'INSERT INTO tbl_t_registration (Event_ID,Registrant_ID,Date_Registered,Payment_Type) VALUES ('.$ID.','.$RID.',CURRENT_DATE,"'.$Payment.'")';
		$RegisterEvent = mysqli_query($euceventMysqli,$RegisterEventSQL) or die (mysqli_error($euceventMysqli));


		// echo 'OK';
		// $header = 'Location:/euc_regi/index_Cust.php?stat=1';
		// header($header);
	}	

	$Output = "Registration_Print.php?event=".$ID."&R=".$RID."";
	echo $Output;
	
?>