<?php
session_start();
date_default_timezone_set('Asia/Manila');
		include('config.php');
		$Status = $_POST['ID'];

		$CurrDate = time();

		if($Status == 0)
		{
			$EventListSQL = 'SELECT Event_ID,User_ID,Event_Title,Event_Phases,Event_Date,DATE_ADD(Event_Date, INTERVAL (Event_Phases-1) DAY) AS EndDate, Event_Time,Event_Location, Event_OrganizerDetail, Event_Desc FROM tbl_t_event ORDER BY Event_Title';
			// $EventListSQL = 'SELECT * FROM tbl_t_event ORDER BY Event_ID DESC';
			$EventList = mysqli_query($euceventMysqli,$EventListSQL) or die (mysqli_error($euceventMysqli));
			if(mysqli_num_rows($EventList) > 0)
			{
					while($row = mysqli_fetch_assoc($EventList))
					{
						$ID = $row['Event_ID'];
						$UID = $row['User_ID'];
						$Title = $row['Event_Title'];
						$Date = $row['Event_Date'];
						$EndDate = $row['EndDate'];
						$Time = $row['Event_Time'];
						$Location = $row['Event_Location'];
						$Organizer = $row['Event_OrganizerDetail'];
						$Desc = $row['Event_Desc'];

						if($Date!= '' || $Date!= null)
						{
							// if($Date <= DATE("Y-m-d") && $EndDate >= DATE("Y-m-d"))
							// {
							// 	$Status = '<span class="label label-success">'.$Date.'True'.$EndDate.'</span>';
							// }
							// else
							// {
							// 	$Status = '<span class="label label-danger">'.$Date.'False'.$EndDate.'</span>';
							// }

							if ($Date > DATE("Y-m-d")) 
							{
									$Status = '<span class="label label-success">Registration</span>';
									
							} 
							elseif ($Date <= DATE("Y-m-d") && $EndDate >= DATE("Y-m-d"))
							{
								$Status = '<span class="label label-warning">Ongoing</span>';
							}
							else
							{
									$Status = '<span class="label label-danger">Finished</span>';
							}
						}
						else
						{
							$Status = '<span class="label label-default">Coming Soon</span>';
						}


						echo '
						<tr>
						  <td>'.$ID.'</td>
						  <td>'.$Title.'</td>
						  <td>'.$Location.'</td>
						  <td>'.$Date.'</td>
						  <td>'.$EndDate.'</td>
						  <td>'.$Time.'</td>
						  <td class="hide">'.$Organizer.'</td>
						  <td>'.$Status.'</td>
						  <td>'.$Desc.'</td>
						</tr>';

					}
			}
		}
		elseif($Status == 1)
		{
			$EventListSQL = 'SELECT Event_ID,User_ID,Event_Title,Event_Phases,Event_Date,DATE_ADD(Event_Date, INTERVAL (Event_Phases-1) DAY) AS EndDate, Event_Time,Event_Location, Event_OrganizerDetail, Event_Desc FROM tbl_t_event WHERE CURRENT_DATE < Event_Date ORDER BY Event_Title';
			$EventList = mysqli_query($euceventMysqli,$EventListSQL) or die (mysqli_error($euceventMysqli));
			if(mysqli_num_rows($EventList) > 0)
			{
					while($row = mysqli_fetch_assoc($EventList))
					{
						$ID = $row['Event_ID'];
						$UID = $row['User_ID'];
						$Title = $row['Event_Title'];
						$Date = $row['Event_Date'];
						$EndDate = $row['EndDate'];
						$Time = $row['Event_Time'];
						$Location = $row['Event_Location'];
						$Organizer = $row['Event_OrganizerDetail'];
						$Desc = $row['Event_Desc'];

						if($Date!= '' || $Date!= null)
						{
							if (strtotime($Date) > $CurrDate) 
							{
									$Status = '<span class="label label-success">Registration</span>';
									#$date occurs in the future
							} 
							else if ($Date == DATE("Y-m-d"))
							{
								$Status = '<span class="label label-warning">Ongoing</span>';
								#$date occurs now or in the past
							}
							else
							{
									$Status = '<span class="label label-danger">Finished</span>';
							}
						}
						else
						{
							$Status = '<span class="label label-default">Coming Soon</span>';
						}


						echo '
						<tr>
						  <td>'.$ID.'</td>
						  <td>'.$Title.'</td>
						  <td>'.$Location.'</td>
						  <td>'.$Date.'</td>
						  <td>'.$EndDate.'</td>
						  <td>'.$Time.'</td>
						  <td class="hide">'.$Organizer.'</td>
						  <td>'.$Status.'</td>
						  <td>'.$Desc.'</td>
						</tr>';

					}
			}
		}
		elseif($Status == 2)
		{
			$EventListSQL = 'SELECT Event_ID,User_ID,Event_Title,Event_Phases,Event_Date,DATE_ADD(Event_Date, INTERVAL (Event_Phases-1) DAY) AS EndDate, Event_Time,Event_Location, Event_OrganizerDetail, Event_Desc FROM tbl_t_event WHERE CURRENT_DATE BETWEEN Event_Date AND DATE_ADD(Event_Date, INTERVAL (Event_Phases-1) DAY) ORDER BY Event_Title';
                      
			// $EventListSQL = 'SELECT * FROM tbl_t_event WHERE Event_Date = CURRENT_DATE ORDER BY Event_ID DESC';
			$EventList = mysqli_query($euceventMysqli,$EventListSQL) or die (mysqli_error($euceventMysqli));
			if(mysqli_num_rows($EventList) > 0)
			{
					while($row = mysqli_fetch_assoc($EventList))
					{
						$ID = $row['Event_ID'];
						$UID = $row['User_ID'];
						$Title = $row['Event_Title'];
						$Date = $row['Event_Date'];
						$EndDate = $row['EndDate'];
						$Time = $row['Event_Time'];
						$Location = $row['Event_Location'];
						$Organizer = $row['Event_OrganizerDetail'];
						$Desc = $row['Event_Desc'];

						if($Date!= '' || $Date!= null)
						{
							if (strtotime($Date) > $CurrDate) 
							{
									$Status = '<span class="label label-success">Registration</span>';
									#$date occurs in the future
							} 
							else
							{
								$Status = '<span class="label label-warning">Ongoing</span>';
								#$date occurs now or in the past
							}
							// else
							// {
							// 		$Status = '<span class="label label-danger">Finished</span>';
							// }
						}
						else
						{
							$Status = '<span class="label label-default">Coming Soon</span>';
						}


						echo '
						<tr>
						  <td>'.$ID.'</td>
						  <td>'.$Title.'</td>
						  <td>'.$Location.'</td>
						  <td>'.$Date.'</td>
						  <td>'.$EndDate.'</td>
						  <td>'.$Time.'</td>
						  <td class="hide">'.$Organizer.'</td>
						  <td>'.$Status.'</td>
						  <td>'.$Desc.'</td>
						</tr>';

					}
			}
		}
		elseif($Status == 3)
		{

			$EventListSQL = 'SELECT Event_ID,User_ID,Event_Title,Event_Phases,Event_Date,DATE_ADD(Event_Date, INTERVAL (Event_Phases-1) DAY) AS EndDate, Event_Time,Event_Location, Event_OrganizerDetail, Event_Desc FROM tbl_t_event WHERE CURRENT_DATE > DATE_ADD(Event_Date, INTERVAL (Event_Phases-1) DAY) ORDER BY Event_Title';
			// $EventListSQL = 'SELECT * FROM tbl_t_event WHERE Event_Date < CURRENT_DATE ORDER BY Event_ID DESC';
			$EventList = mysqli_query($euceventMysqli,$EventListSQL) or die (mysqli_error($euceventMysqli));
			if(mysqli_num_rows($EventList) > 0)
			{
					while($row = mysqli_fetch_assoc($EventList))
					{
						$ID = $row['Event_ID'];
						$UID = $row['User_ID'];
						$Title = $row['Event_Title'];
						$Date = $row['Event_Date'];
						$EndDate = $row['EndDate'];
						$Time = $row['Event_Time'];
						$Location = $row['Event_Location'];
						$Organizer = $row['Event_OrganizerDetail'];
						$Desc = $row['Event_Desc'];

						if($Date!= '' || $Date!= null)
						{
							if (strtotime($Date) > $CurrDate) 
							{
									$Status = '<span class="label label-success">Registration</span>';
									#$date occurs in the future
							} 
							else if ($Date == DATE("Y-m-d"))
							{
								$Status = '<span class="label label-warning">Ongoing</span>';
								#$date occurs now or in the past
							}
							else
							{
									$Status = '<span class="label label-danger">Finished</span>';
							}
						}
						else
						{
							$Status = '<span class="label label-default">Coming Soon</span>';
						}


						echo '
						<tr>
						  <td>'.$ID.'</td>
						  <td>'.$Title.'</td>
						  <td>'.$Location.'</td>
						  <td>'.$Date.'</td>
						  <td>'.$EndDate.'</td>
						  <td>'.$Time.'</td>
						  <td class="hide">'.$Organizer.'</td>
						  <td>'.$Status.'</td>
						  <td>'.$Desc.'</td>
						</tr>';

					}
			}
		}

?>