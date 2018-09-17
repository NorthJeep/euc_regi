<?php
	include('config.php');
	if(isset($_POST['Event']) && isset($_POST['Company']))
	{
		$ID = $_POST['Event'];
		$CName = $_POST['Company'];

		$List = "";

		$EventSQL = 'SELECT * FROM tbl_t_event WHERE Event_ID ='.$ID.' ';
		$Event = mysqli_query($euceventMysqli,$EventSQL) or die(mysqli_error($euceventMysqli));
		if(mysqli_num_rows($Event) > 0)
		{
			while($row = mysqli_fetch_assoc($Event))
			{
				$Title = $row['Event_Title'];
				$Date = $row['Event_Date'];
				$Phase = $row['Event_Phases'];
				$Time = $row['Event_Time'];
				$Price = $row['Event_Price'];
			}
		}

		if($CName == "All")
		{
			$ParticipantSQL = 'SELECT 
								IFNULL(tbl_t_registrant.Registrant_ID," ") AS Registrant_ID,
								IFNULL(tbl_t_registrant.First_Name," ") AS First_Name,
								IFNULL(tbl_t_registrant.Middle_Name," ") AS Middle_Name,
								IFNULL(tbl_t_registrant.Last_Name," ") AS Last_Name,
								IFNULL(tbl_t_registrant.Ext_Name," ") AS Ext_Name,
								IFNULL(tbl_t_registrant.Company," ") AS Company,
								IFNULL(tbl_t_registration.Registration_No," ") AS Registration_No,
								IFNULL(tbl_t_registration.Date_Registered," ") AS Date_Registered,
								IFNULL(aes_decrypt(tbl_t_registrant.Contact,"eucevent")," ") AS Contact,
                                IFNULL(aes_decrypt(tbl_t_registrant.Email,"eucevent")," ") AS Email
							 FROM tbl_t_registration
							 INNER JOIN tbl_t_registrant
							 	ON tbl_t_registrant.Registrant_ID = tbl_t_registration.Registrant_ID
							 WHERE tbl_t_registration.Event_ID ='.$ID.'';
		}
		else
		{
			$ParticipantSQL = 'SELECT 
								IFNULL(tbl_t_registrant.Registrant_ID," ") AS Registrant_ID,
								IFNULL(tbl_t_registrant.First_Name," ") AS First_Name,
								IFNULL(tbl_t_registrant.Middle_Name," ") AS Middle_Name,
								IFNULL(tbl_t_registrant.Last_Name," ") AS Last_Name,
								IFNULL(tbl_t_registrant.Ext_Name," ") AS Ext_Name,
								IFNULL(tbl_t_registrant.Company," ") AS Company,
								IFNULL(tbl_t_registration.Registration_No," ") AS Registration_No,
								IFNULL(tbl_t_registration.Date_Registered," ") AS Date_Registered,
								IFNULL(aes_decrypt(tbl_t_registrant.Contact,"eucevent")," ") AS Contact,
                                IFNULL(aes_decrypt(tbl_t_registrant.Email,"eucevent")," ") AS Email
							 FROM tbl_t_registration
							 INNER JOIN tbl_t_registrant
							 	ON tbl_t_registrant.Registrant_ID = tbl_t_registration.Registrant_ID
							 WHERE tbl_t_registration.Event_ID ='.$ID.'
							 	AND tbl_t_registrant.Company = "'.$CName.'" ';
		}

		
		$Participant = mysqli_query($euceventMysqli,$ParticipantSQL) or die(mysqli_error($euceventMysqli));
		if(mysqli_num_rows($Participant) > 0)
		{
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

				$List .='
					<tr>
	                  <td class="hide">'.$RID.'</td>
	                  <td>'.$FName.'</td>
	                  <td>'.$MName.'</td>
	                  <td>'.$LName.'</td>
	                  <td>'.$XName.'</td>
	                  <td>'.$Company.'</td>
	                  <td>'.$Date.'</td>
	                  <td class="">'.$Price.'</td>
	                  <td>'.$TotalAmount.'</td>
	                  <td>'.$PaymentStatus.'</td>
	                  <td>
                        <button class="btn btn-primary" id="BalanceChecksss" onclick="EditRecord('.$Rno.')" data-toggle="modal" data-target="#modal-default_check"><i class="fa fa-cogs"></i></button>
                      </td>
	                </tr>';
			}
		}
		else
		{
			$List .='
					<tr>
	                  <td class="hide">N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                </tr>';
		}
	}
	else
	{
		$List .='
					<tr>
	                  <td class="hide">N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td class="hide"></td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                </tr>';
	}
	echo $List;

?>