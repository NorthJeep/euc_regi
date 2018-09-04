<?php
		include('config.php');
		$Status = $_POST['ID'];

		$CurrDate = time();

		if($Status == 0)
		{
			$EventListSQL = 'SELECT * FROM tbl_t_event ORDER BY Event_ID DESC';
			$EventList = mysqli_query($euceventMysqli,$EventListSQL) or die (mysqli_error($euceventMysqli));
			if(mysqli_num_rows($EventList) > 0)
			{
					while($row = mysqli_fetch_assoc($EventList))
					{
						$ID = $row['Event_ID'];
						$UID = $row['User_ID'];
						$Title = $row['Event_Title'];
						$Date = $row['Event_Date'];
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
						  <td class="hide">'.$ID.'</td>
						  <td>'.$Title.'</td>
						  <td>'.$Location.'</td>
						  <td>'.$Date.'</td>
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
			$EventListSQL = 'SELECT * FROM tbl_t_event WHERE Event_Date > CURRENT_DATE ORDER BY Event_ID DESC';
			$EventList = mysqli_query($euceventMysqli,$EventListSQL) or die (mysqli_error($euceventMysqli));
			if(mysqli_num_rows($EventList) > 0)
			{
					while($row = mysqli_fetch_assoc($EventList))
					{
						$ID = $row['Event_ID'];
						$UID = $row['User_ID'];
						$Title = $row['Event_Title'];
						$Date = $row['Event_Date'];
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
						  <td class="hide">'.$ID.'</td>
						  <td>'.$Title.'</td>
						  <td>'.$Location.'</td>
						  <td>'.$Date.'</td>
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
			$EventListSQL = 'SELECT * FROM tbl_t_event WHERE Event_Date = CURRENT_DATE ORDER BY Event_ID DESC';
			$EventList = mysqli_query($euceventMysqli,$EventListSQL) or die (mysqli_error($euceventMysqli));
			if(mysqli_num_rows($EventList) > 0)
			{
					while($row = mysqli_fetch_assoc($EventList))
					{
						$ID = $row['Event_ID'];
						$UID = $row['User_ID'];
						$Title = $row['Event_Title'];
						$Date = $row['Event_Date'];
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
						  <td class="hide">'.$ID.'</td>
						  <td>'.$Title.'</td>
						  <td>'.$Location.'</td>
						  <td>'.$Date.'</td>
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
			$EventListSQL = 'SELECT * FROM tbl_t_event WHERE Event_Date < CURRENT_DATE ORDER BY Event_ID DESC';
			$EventList = mysqli_query($euceventMysqli,$EventListSQL) or die (mysqli_error($euceventMysqli));
			if(mysqli_num_rows($EventList) > 0)
			{
					while($row = mysqli_fetch_assoc($EventList))
					{
						$ID = $row['Event_ID'];
						$UID = $row['User_ID'];
						$Title = $row['Event_Title'];
						$Date = $row['Event_Date'];
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
						  <td class="hide">'.$ID.'</td>
						  <td>'.$Title.'</td>
						  <td>'.$Location.'</td>
						  <td>'.$Date.'</td>
						  <td>'.$Time.'</td>
						  <td class="hide">'.$Organizer.'</td>
						  <td>'.$Status.'</td>
						  <td>'.$Desc.'</td>
						</tr>';

					}
			}
		}

?>