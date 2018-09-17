<?php
	
	include('config.php');

	require 'vendor/autoload.php';

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();

	$spreadsheet->getActiveSheet()->mergeCells('A1:E1');
	$spreadsheet->getActiveSheet()->mergeCells('A2:E2');
	$spreadsheet->getActiveSheet()->mergeCells('A3:E3');


	$sheet->setCellValue('A1', "Electronic Financials Users’ Circle (EUC), Inc.");
	

	$sheet->setCellValue('A5', "Registration No.");
	$sheet->setCellValue('B5', "Registratrant ID");
	$sheet->setCellValue('C5', "Last Name");
	$sheet->setCellValue('D5', "First Name");
	$sheet->setCellValue('E5', "Middle Name");
	$sheet->setCellValue('F5', "Extension Name");
	$sheet->setCellValue('G5', "Company");
	$sheet->setCellValue('H5', "Contact");
	$sheet->setCellValue('I5', "Email");
	$sheet->setCellValue('J5', "Date Registered");
	// $sheet->setCellValue('A1', "".((isset($_POST['Event']))?$_POST['Event']:"NOT")."");

	$Type = $_POST['Type'];

	if($Type == "Delegates")
	{

		if(isset($_POST['Event']) && isset($_POST['Company']))
		{
			$CName = $_POST['Company'];
			$ID = $_POST['Event'];

			if($ID == 0)
			{
				$Title = "N/A";
				$Location = "N/A";
			}
			else
			{
				$EventSelectSQL = 'SELECT * FROM tbl_t_event WHERE Event_ID ='.$ID.' ';
				$EventSelect = mysqli_query($euceventMysqli,$EventSelectSQL) or die(mysqli_error($euceventMysqli));
				if(mysqli_num_rows($EventSelect) > 0)
				{
					while($row2 = mysqli_fetch_assoc($EventSelect))
					{
						$Title = $row2['Event_Title'];
						$Location = $row2['Event_Location'];
					}
				}

			}

			$sheet->setCellValue('A2',"Event: ".$Title."");
			$sheet->setCellValue('A3',"Location: ".$Location."");
			

			if($CName == "All")
			{
				$ParticipantSQL = 'SELECT 
									IFNULL(tbl_t_registrant.Registrant_ID,"") AS Registrant_ID,
									IFNULL(tbl_t_registrant.First_Name,"") AS First_Name,
									IFNULL(tbl_t_registrant.Middle_Name,"") AS Middle_Name,
									IFNULL(tbl_t_registrant.Last_Name,"") AS Last_Name,
									IFNULL(tbl_t_registrant.Ext_Name,"") AS Ext_Name,
									IFNULL(tbl_t_registrant.Company,"") AS Company,
									IFNULL(tbl_t_registration.Registration_No,"") AS Registration_No,
									IFNULL(tbl_t_registration.Date_Registered,"") AS Date_Registered,
									IFNULL(aes_decrypt(tbl_t_registrant.Contact,"eucevent"),"") AS Contact,
	                                IFNULL(aes_decrypt(tbl_t_registrant.Email,"eucevent"),"") AS Email
								 FROM tbl_t_registration
								 INNER JOIN tbl_t_registrant
								 	ON tbl_t_registrant.Registrant_ID = tbl_t_registration.Registrant_ID
								 WHERE tbl_t_registration.Event_ID ='.$ID.'';
			}
			else
			{
				$ParticipantSQL = 'SELECT 
									IFNULL(tbl_t_registration.Registration_No,"") AS Registration_No,
									IFNULL(tbl_t_registrant.Registrant_ID,"") AS Registrant_ID,
									IFNULL(tbl_t_registrant.Last_Name,"") AS Last_Name,
									IFNULL(tbl_t_registrant.First_Name,"") AS First_Name,
									IFNULL(tbl_t_registrant.Middle_Name,"") AS Middle_Name,
									IFNULL(tbl_t_registrant.Ext_Name,"") AS Ext_Name,
									IFNULL(tbl_t_registrant.Company,"") AS Company,
									IFNULL(tbl_t_registration.Date_Registered,"") AS Date_Registered,
									IFNULL(aes_decrypt(tbl_t_registrant.Contact,"eucevent")," ") AS Contact,
	                                IFNULL(aes_decrypt(tbl_t_registrant.Email,"eucevent"),"") AS Email
								 FROM tbl_t_registration
								 INNER JOIN tbl_t_registrant
								 	ON tbl_t_registrant.Registrant_ID = tbl_t_registration.Registrant_ID
								 WHERE tbl_t_registration.Event_ID ='.$ID.'
								 	AND tbl_t_registrant.Company = "'.$CName.'" ';
			}

			$Participant = mysqli_query($euceventMysqli,$ParticipantSQL) or die(mysqli_error($euceventMysqli));
			if(mysqli_num_rows($Participant) > 0)
			{
				$ctr = 6;
				while($row = mysqli_fetch_assoc($Participant))
				{
					$Rno = $row['Registration_No'];
					$RID = $row['Registrant_ID'];
					$FName = $row['First_Name'];
					$MName = $row['Middle_Name'];
					$LName = $row['Last_Name'];
					$XName = $row['Ext_Name'];
					$Company = $row['Company'];
					$Contact = $row['Contact'];
					$Email = $row['Email'];
					$Date = $row['Date_Registered'];

					$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $ctr, "$Rno");
					$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $ctr, "$RID");
					$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $ctr, "$LName");
					$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $ctr, "$FName");
					$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $ctr, "$MName");
					$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(6, $ctr, "$XName");
					$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(7, $ctr, "$Company");
					$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(8, $ctr, "$Contact");
					$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(9, $ctr, "$Email");
					$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(10, $ctr, "$Date");

					$ctr++;
				}
				
			}
			else
			{
				
			}
		}
		else
		{
			echo 'Nothing Selected';
		}
	}

	$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
	$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
	$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
	$spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
	$spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);


	$writer = new Xlsx($spreadsheet);

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Export'.DATE("Y-m-d").'.xlsx"');
    // ob_end_clean();
	$writer->save("php://output");
	//$writer->save('hello world.xlsx');

	// if(isset($_POST['Type']))
	// {
	// 	$Type = $_POST['Type'];
	// 	$Export = "";

		
?>