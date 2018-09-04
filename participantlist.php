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
									IFNULL(tbl_t_registrant.Contact," ") AS Contact,
									IFNULL(tbl_t_registrant.Email," ") AS Email
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

				$List .='
					<tr>
	                  <td class="hide">'.$RID.'</td>
	                  <td>'.$FName.'</td>
	                  <td>'.$MName.'</td>
	                  <td>'.$LName.'</td>
	                  <td>'.$XName.'</td>
	                  <td>'.$Contact.'</td>
	                  <td>'.$Email.'</td>
	                  
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
	                  
	                </tr>';
	}
	echo $List;

?>