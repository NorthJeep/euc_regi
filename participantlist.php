<?php
	include('config.php');
	if(isset($_POST['ID']))
	{
		$ID = $_POST['ID'];
		$List = "";
		$ParticipantSQL = 'SELECT IFNULL(tbl_t_registrant.Registrant_ID," ") AS Registrant_ID,
									IFNULL(tbl_t_registrant.First_Name," ") AS First_Name,
									IFNULL(tbl_t_registrant.Middle_Name," ") AS Middle_Name,
									IFNULL(tbl_t_registrant.Last_Name," ") AS Last_Name,
									IFNULL(tbl_t_registrant.Ext_Name," ") AS Ext_Name,
									IFNULL(tbl_t_registration.Date_Registered," ") AS Date_Registered,
									IFNULL(tbl_t_registration.Payment_Type," ") AS Payment_Type,
									IFNULL(tbl_t_registration.Payment_Status," ") AS Payment_Status,
									IFNULL(aes_decrypt(tbl_t_registrant.Contact,"eucevent")," ") AS Contact,
                                  IFNULL(aes_decrypt(tbl_t_registrant.Email,"eucevent")," ") AS Email
							 FROM tbl_t_registration
							 INNER JOIN tbl_t_registrant
							 	ON tbl_t_registrant.Registrant_ID = tbl_t_registration.Registrant_ID
							 WHERE tbl_t_registration.Event_ID ='.$ID.'';
		$Participant = mysqli_query($euceventMysqli,$ParticipantSQL) or die(mysqli_error($euceventMysqli));
		if(mysqli_num_rows($Participant) > 0)
		{
			while($row = mysqli_fetch_assoc($Participant))
			{
				$RID = $row['Registrant_ID'];
				$FName = $row['First_Name'];
				$MName = $row['Middle_Name'];
				$LName = $row['Last_Name'];
				$XName = $row['Ext_Name'];
				$Contact = $row['Contact'];
				$Email = $row['Email'];
				$Date = $row['Date_Registered'];
				$PaymentType = $row['Payment_Type'];

				if($row['Payment_Status'] == "F")
				{
					$PaymentStatus = "Fully Paid";
				}
				else if($row['Payment_Status'] == "P")
				{
					$PaymentStatus = "Partial Paid";
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
	                  <td>'.$Contact.'</td>
	                  <td>'.$Email.'</td>
	                  <td>'.$Date.'</td>
	                  <td>'.$PaymentType.'</td>
	                  <td>'.$PaymentStatus.'</td>
	                  <td>
                        <button type="button" class="btn btn-primary BalanceCheck" data-toggle="modal" data-target="#modal-default_check">Edit</button>
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
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                  <td>N/A</td>
	                </tr>';
	}
	echo $List;

?>