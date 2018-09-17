<?php
	include('config.php');
	session_start();
	require 'vendor/autoload.php';

	use PhpOffice\PhpSpreadsheet\Spreadsheet;

	$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");

	
	$target_dir = "imports/";
    $target_file = $target_dir . basename($_FILES["ImportFile"]["name"]);
    $filename = $_FILES["ImportFile"]["name"];
    move_uploaded_file($_FILES["ImportFile"]["tmp_name"],$target_file);

	$spreadsheet = $reader->load($target_file);

	$sheet = $spreadsheet->getActiveSheet();

	$cellValue = $spreadsheet->getActiveSheet()->getCell('A2')->getValue();
	$highestRow = $spreadsheet->getActiveSheet()->getHighestRow();

	$EventCheckSQL = 'SELECT * FROM tbl_t_event WHERE Event_Title = "'.substr($cellValue,7).'"';
	$EventCheck = mysqli_query($euceventMysqli,$EventCheckSQL) or die (mysqli_error($euceventMysqli));
	if(mysqli_num_rows($EventCheck) > 0)
	{
		while($checkRow = mysqli_fetch_assoc($EventCheck))
		{
			$EID = $checkRow['Event_ID'];
		}
	}

	// echo '<table border="10" cellpadding="8">';
	for($ctr=6;$ctr<=$highestRow;$ctr++)
	{
		// echo '<tr>';

		$FName = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4,$ctr)->getValue();
		$MName = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5,$ctr)->getValue();
		$LName = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(3,$ctr)->getValue();
		$XName = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(6,$ctr)->getValue();
		$Company = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(7,$ctr)->getValue();
		$Contact = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(8,$ctr)->getValue();
		$Email = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(9,$ctr)->getValue();
		$Date = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(10,$ctr)->getValue();

		$RegCheckImportSQL = 'SELECT * 
								FROM tbl_t_registrant 
								WHERE (First_Name = "'.$FName.'" AND 
										Middle_Name = "'.$MName.'" AND 
														Last_Name = "'.$LName.'" AND  
														Ext_Name = "'.$XName.'") OR
														Email = aes_encrypt("'.$Email.'","eucevent")';
		$RegCheckImport = mysqli_query($euceventMysqli,$RegCheckImportSQL) or die (mysqli_error($euceventMysqli));
		if(mysqli_num_rows($RegCheckImport) > 0)
		{
			while($row = mysqli_fetch_assoc($RegCheckImport))
			{
				$RID = $row['Registrant_ID'];
			}

			$RegistrationCheckSQL = 'SELECT * 
									FROM tbl_t_registration 
									WHERE Event_ID='.$EID.' AND Registrant_ID ='.$RID.' ';
			$RegistrationCheck = mysqli_query($euceventMysqli,$RegistrationCheckSQL) or die (mysqli_error($euceventMysqli));
			if(mysqli_num_rows($RegistrationCheck) > 0)
			{
				$RegistrantUpdateSQL = 'UPDATE tbl_t_registrant SET Contact = aes_encrypt("'.$Contact.'","eucevent"), Email = aes_encrypt("'.$Email.'","eucevent"), Company = "'.$Company.'" WHERE Registrant_ID = '.$RID.' ';
				$RegistrantUpdate = mysqli_query($euceventMysqli,$RegistrantUpdateSQL) or die (mysqli_error($euceventMysqli));
			}
			else
			{
				$RegistrantUpdateSQL = 'UPDATE tbl_t_registrant SET Contact = aes_encrypt("'.$Contact.'","eucevent"), Email = aes_encrypt("'.$Email.'","eucevent"), Company = "'.$Company.'" WHERE Registrant_ID = '.$RID.' ';
				$RegistrantUpdate = mysqli_query($euceventMysqli,$RegistrantUpdateSQL) or die (mysqli_error($euceventMysqli));

				$RegisterEventSQL = 'INSERT INTO tbl_t_registration (Event_ID,Registrant_ID,Date_Registered) VALUES ('.$EID.','.$RID.','.$Date.')';
				$RegisterEvent = mysqli_query($euceventMysqli,$RegisterEventSQL) or die (mysqli_error($euceventMysqli));
			}

		}
		else
		{
			// INSERT REGISTRANT DETAILS

			$RegisterSQL = 'INSERT INTO tbl_t_registrant (First_Name,
														Middle_Name,
														Last_Name,
														Ext_Name,
														Company,
														Contact,
														Email) 
							VALUES ("'.$FName.'",
									"'.$MName.'",
									"'.$LName.'",
									"'.$XName.'",
									"'.$Company.'",
									aes_encrypt("'.$Contact.'","eucevent"),
									aes_encrypt("'.$Email.'","eucevent"))';
			$Register = mysqli_query($euceventMysqli,$RegisterSQL) or die (mysqli_error($euceventMysqli));

			// GET LAST ENTERED REGISTRANT ID

			$RegistrantIDSQL = 'SELECT * FROM tbl_t_registrant ORDER BY Registrant_ID DESC LIMIT 1';
			$RegistrantID = mysqli_query($euceventMysqli,$RegistrantIDSQL) or die (mysqli_error($euceventMysqli));
			if(mysqli_num_rows($RegistrantID) > 0)
			{
				while($row = mysqli_fetch_assoc($RegistrantID))
				{
					$RID2 = $row['Registrant_ID'];	
				}
			}

			$RegisterEventSQL = 'INSERT INTO tbl_t_registration (Event_ID,Registrant_ID,Date_Registered) VALUES ('.$EID.','.$RID2.',"'.$Date.'")';
			$RegisterEvent = mysqli_query($euceventMysqli,$RegisterEventSQL) or die (mysqli_error($euceventMysqli));
		}

		
		// echo '</tr>';
	}
	// echo '</table>';

	// echo '<table border="1" cellpadding="8">';
	// foreach($sheet->getRowIterator(5,10) as $row)
	// {
	// 	$cellIterator = $row->getCellIterator();
	// 	$cellIterator->setIterateOnlyExistingCells(false);
	// 	echo '<tr>';

	// 	$EventInsertImportsQL = 'INSERT INTO tbl_t';

	// 	$RegCheckImportSQL = 'SELECT First_Name,Middle_Name,Last_Name,Ext_Name FROM tbl_t_registrant';
	// 	foreach($cellIterator as $cell)
	// 	{

	// 		if(!is_null($cell))
	// 		{
	// 			$value = $cell->getValue();

	// 			echo '<td>'.$value.'</td>';
	// 		}
	// 	}
	// 	echo '</tr>';
	// }
	// echo '</table>';
	//echo $target_file;
	header('Location:list_of_delegates.php?user='.$_SESSION['LoggedIn'].'');
?>