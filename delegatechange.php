<?php
	include('config.php');

	$Rno = $_POST['Rno'];

	$RegistrantDetailSQL = 'SELECT 
									IFNULL(tbl_t_registration.Registration_No,"") AS Registration_No,
									IFNULL(tbl_t_registration.Date_Registered,"") AS Date_Registered,
									IFNULL(tbl_t_registrant.Registrant_ID,"") AS Registrant_ID,
									IFNULL(tbl_t_registrant.First_Name,"") AS First_Name,
									IFNULL(tbl_t_registrant.Middle_Name,"") AS Middle_Name,
									IFNULL(tbl_t_registrant.Last_Name,"") AS Last_Name,
									IFNULL(tbl_t_registrant.Ext_Name,"") AS Ext_Name,
									IFNULL(tbl_t_registrant.Company,"") AS Company,
									IFNULL(aes_decrypt(tbl_t_registrant.Contact,"eucevent")," ") AS Contact,
                                	IFNULL(aes_decrypt(tbl_t_registrant.Email,"eucevent")," ") AS Email,
									IFNULL(tbl_t_event.Event_Title,"") AS Event_Title,
									IFNULL(tbl_t_event.Event_Price,"0.00") AS Event_Price
							FROM tbl_t_registration
							INNER JOIN tbl_t_registrant
								ON tbl_t_registration.Registrant_ID = tbl_t_registrant.Registrant_ID
							INNER JOIN tbl_t_event
								ON tbl_t_registration.Event_ID = tbl_t_event.Event_ID
							WHERE tbl_t_registration.Registration_No = '.$Rno.' ';
	$RegistrantDetail = mysqli_query($euceventMysqli,$RegistrantDetailSQL) or die(mysqli_error($euceventMysqli));
		if(mysqli_num_rows($RegistrantDetail) > 0)
		{
			while($row = mysqli_fetch_assoc($RegistrantDetail))
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
				$Title = $row['Event_Title'];
				$Price = $row['Event_Price'];


				$Payment_Status = '';


				$PaymentSQL = 'SELECT tbl_t_payment.Payment_ID,
										tbl_t_payment.Payment_Amount,
										tbl_t_payment.Payment_Date,
										tbl_t_payment.Registration_No
								FROM tbl_t_payment WHERE Registration_No = '.$Rno.' ';
				$Payment =  mysqli_query($euceventMysqli,$PaymentSQL) or die(mysqli_error($euceventMysqli));
				if(mysqli_num_rows($Payment) > 0)
				{
					$TotalAmount = 0.00;
					while($row = mysqli_fetch_assoc($Payment))
					{
						$TotalAmount += $row['Payment_Amount'];
					}
				}
				else
				{
					$TotalAmount = 0.00;
				}
				
				if($TotalAmount == $Price)
				{
					$PaymentStatus = "Fully Paid";
				}
				else if($TotalAmount < $Price && $TotalAmount != 0.00)
				{
					$PaymentStatus = "Partially Paid";
				}
				else
				{
					$PaymentStatus = "Unpaid";
				}
			}
		}

		$DataArray = array(
			'Rno' => $Rno,
			'EName' => $Title,
			'EPrice' => $Price,
			'FName' => $FName,
			'MName' => $MName,
			'LName' => $LName,
			'XName' => $XName,
			'Company' => $Company,
			'Contact' => $Contact,
			'Email' => $Email,
			'Date' => $Date,
			'Amount' => $TotalAmount,
			'Status' => $PaymentStatus
		);

		echo json_encode($DataArray);

?>