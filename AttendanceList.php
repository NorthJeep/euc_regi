<?php
	include('config.php');
	if(isset($_POST['ID']))
	{
		$ID = $_POST['ID'];
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

		// $SelectAttendSQL = 'SELECT * 
		// 					FROM tbl_t_attendance 
		// 					INNER JOIN tbl_t_registration
		// 						ON tbl_t_attendance.Registration_No = tbl_t_registration.Registration_No
		// 					INNER JOIN tbl_t_event
		// 						ON tbl_t_registration.Event_ID = tbl_t_event.Event_ID
		// 					WHERE tbl_t_event = '.$ID.' ';

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
                                ON P.Registration_No = R.Registration_No
 							 WHERE R.Event_ID = '.$ID.'
                             	AND P.Pay_Amount >= E.Event_Price';
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
				$Phase = $row['Phases'];
				$Email = $row['Email'];
				$EventDate = $row['EventDate'];
				$Date = $row['Date_Registered'];

				$PhaseCountSQL = 'SELECT COUNT(tbl_t_attendance.Registration_No) AS PhaseCount  FROM tbl_t_attendance
WHERE tbl_t_attendance.Registration_No = '.$Rno.' ';
				$PhaseCount = mysqli_query($euceventMysqli,$PhaseCountSQL) or die (mysqli_error($euceventMysqli));
				if(mysqli_num_rows($PhaseCount) > 0)
				{
					while($row = mysqli_fetch_assoc($PhaseCount))
					{
						$PhaseAttended = $row['PhaseCount'];
					}
				}

				if($PhaseAttended >= $Phase)
				{
					$List .='
					<tr>
	                  <td>'.$Rno.'</td>
	                  <td>'.$FName.'</td>
	                  <td>'.$MName.'</td>
	                  <td>'.$LName.'</td>
	                  <td>'.$XName.'</td>
	                  <td>'.$Company.'</td>
	                  <td>'.$Date.'</td>
	                  <td>'.$Phase.'</td>
	                  <td>'.$PhaseAttended.'</td>
	                  <td>
                        <button type="button" class="btn btn-success" onclick="RecordAttend('.$Rno.')" disabled="">Completed</button>
                      </td>
	                </tr>';
				}
				else
				{
					$List .='
					<tr>
	                  <td>'.$Rno.'</td>
	                  <td>'.$FName.'</td>
	                  <td>'.$MName.'</td>
	                  <td>'.$LName.'</td>
	                  <td>'.$XName.'</td>
	                  <td>'.$Company.'</td>
	                  <td>'.$Date.'</td>
	                  <td>'.$Phase.'</td>
	                  <td>'.$PhaseAttended.'</td>
	                  <td>
                        <button type="button" class="btn btn-warning" onclick="RecordAttend('.$Rno.')">Attend</button>
                      </td>
	                </tr>';
				}

				
			}
		}
		else
		{
			$List .='
					<tr>
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
	                  <td>N/A</td>
	                </tr>';
		}
	}
	else
	{
		$List .='
					<tr>
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
	                  <td>N/A</td>
	                </tr>';
	}
	echo $List;

?>