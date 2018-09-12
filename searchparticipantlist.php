<?php
	include('config.php');
	if(isset($_POST['ID']) && isset($_POST['Search']))
	{
		$ID = $_POST['ID'];
		$Search = $_POST['Search'];
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


		$ParticipantSQL = 'SELECT 
								IFNULL(R.Registration_No," ") AS Registration_No,
								IFNULL(T.Registrant_ID," ") AS Registrant_ID,
								IFNULL(T.First_Name," ") AS First_Name,
								IFNULL(T.Middle_Name," ") AS Middle_Name,
								IFNULL(T.Last_Name," ") AS Last_Name,
								IFNULL(T.Ext_Name," ") AS Ext_Name,
								IFNULL(T.Company," ") AS Company,
								IFNULL(E.Event_Date," ") AS EventDate,
								IFNULL(E.Event_Phases," ") AS Phases,
								IFNULL(R.Date_Registered," ") AS Date_Registered,
								IFNULL(aes_decrypt(T.Contact,"eucevent")," ") AS Contact,
                                IFNULL(aes_decrypt(T.Email,"eucevent")," ") AS Email
							 FROM tbl_t_registration AS R
							 INNER JOIN tbl_t_registrant AS T
							 	ON T.Registrant_ID = R.Registrant_ID
							 INNER JOIN tbl_t_event AS E
							 	ON R.Event_ID = E.Event_ID
							 INNER JOIN 
                             	(SELECT
                                     P2.Registration_No,
                                    SUM(P2.Payment_Amount) AS Pay_Amount 
                                    FROM tbl_t_payment AS P2
                                    INNER JOIN tbl_t_registration AS R2
                                    	ON P2.Registration_No = R2.Registration_No
                                    GROUP BY P2.Registration_No) AS P
 							 WHERE (R.Event_ID = '.$ID.'
                             	AND P.Registration_No = R.Registration_No
                             	AND P.Pay_Amount >= E.Event_Price)
							 	AND (T.First_Name LIKE "'.$Search.'%"
							 		OR T.Middle_Name LIKE "'.$Search.'%"
							 		OR T.Last_Name LIKE "'.$Search.'%"
							 		OR T.Ext_Name LIKE "'.$Search.'%")';
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

				// $PaymentType = $row['Payment_Type'];

				// if($row['Payment_Status'] == "F")
				// {
				// 	$PaymentStatus = "Fully Paid";
				// }
				// else if($row['Payment_Status'] == "P")
				// {
				// 	$PaymentStatus = "Partial Paid";
				// }
				// else
				// {
				// 	$PaymentStatus = "Unpaid";
				// }

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
                        <button class="btn btn-primary" id="BalanceChecksss" onclick="EditRecord('.$Rno.')" data-toggle="modal" data-target="#modal-default_check">Edit</button>
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