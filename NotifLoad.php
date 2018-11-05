<?php
	include('config.php');
	date_default_timezone_set('Asia/Manila');

	if(isset($_POST['view']))
	{
		if($_POST['view'] != '')
		{
			$UpdateNotifSQL = 'UPDATE tbl_t_registration SET Notification=1 WHERE Notification=0';
			$UpdateNotifQuery = mysqli_query($euceventMysqli,$UpdateNotifSQL) or die (mysqli_error($euceventMysqli));
		}


		$NotifOut = '<li class="header">New Registrants for this Events:  </li>';

		$notifFlag = 1;
		$NotifLoadSQL = 'SELECT DISTINCT tbl_t_registration.Event_ID AS E, 
											tbl_t_event.Event_Title AS Title, 
											(SELECT COUNT(Event_ID) 
											FROM tbl_t_registration 
											WHERE Event_ID = E 
												AND Notification = 0 LIMIT 1) AS Count
											FROM tbl_t_registration 
											INNER JOIN tbl_t_event 
												ON tbl_t_registration.Event_ID = tbl_t_event.Event_ID';
		$NotifLoadQuery = mysqli_query($euceventMysqli,$NotifLoadSQL) or die (mysqli_error($euceventMysqli));

		if(mysqli_num_rows($NotifLoadQuery) > 0)
		{
			while($row = mysqli_fetch_assoc($NotifLoadQuery))
			{
				if($row['Count'] > 0)
				{
					$Title = $row['Title'];
					$Count = $row['Count'];
					$NotifOut .= 	'<li>
					                  <ul class="menu">
					                    <li>
					                      <div href="#" style="margin:10px">
					                      	<span class="col-md-1">
					                      		<i class="fa fa-users text-aqua"></i>
					                      	</span>
					                      	<span class="col-md-7">
					                        	 '.$Title.'
					                        </span> 
					                        <span class="label label-info pull-right">'.$Count.'</span>
					                      </div>
					                    </li>
					                  </ul>
					                </li>';
					$notifFlag = 0;
				}
			}
			if($notifFlag == 1)
			{
				$NotifOut .= '<li>
				                  <ul class="menu">
				                    <li>
				                      <a href="#">
				                        <i class="fa fa-users text-aqua"></i> No Notification
				                      </a>
				                    </li>
				                  </ul>
				                </li>';
			}
		}
		else
		{
			$NotifOut .= '<li>
				                  <ul class="menu">
				                    <li>
				                      <a href="#">
				                        <i class="fa fa-users text-aqua"></i> No Notification
				                      </a>
				                    </li>
				                  </ul>
				                </li>';
		}

		$NotifCountSQL = 'SELECT COUNT(Event_ID) AS NotifCount FROM tbl_t_registration WHERE Notification = 0';
		$NotifCountQuery = mysqli_query($euceventMysqli,$NotifCountSQL) or die (mysqli_error($euceventMysqli));
		$row = mysqli_fetch_assoc($NotifCountQuery);
		$NotifCount = $row['NotifCount'];

		$DataArray = array(
			'Notification' => $NotifOut,
			'NotificationCount' => $NotifCount
		);

		echo json_encode($DataArray);
	}
	else
	{
		$NotifOut = '<li>
		                  <ul class="menu">
		                    <li>
		                      <a href="#">
		                        <i class="fa fa-users text-aqua"></i> No Notification
		                      </a>
		                    </li>
		                  </ul>
		                </li>';

	    $NotifCountSQL = 'SELECT COUNT(Event_ID) AS NotifCount FROM tbl_t_registration WHERE Notification = 0';
		$NotifCountQuery = mysqli_query($euceventMysqli,$NotifCountSQL) or die (mysqli_error($euceventMysqli));
		$row = mysqli_fetch_assoc($NotifCountQuery);
		$NotifCount = $row['NotifCount'];

		$DataArray = array(
			'Notification' => $NotifOut,
			'NotificationCount' => $NotifCount
		);

		echo json_encode($DataArray);
	}

?>