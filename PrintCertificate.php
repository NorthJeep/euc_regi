<?php
	include('config.php');
	if(isset($_POST['Rno']))
	{
		$Rno = $_POST['Rno'];

		$CheckRNoSQL = 'SELECT 
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
 							 WHERE R.Registration_No = '.$Rno.'
                             	AND P.Pay_Amount >= E.Event_Price';
		$CheckRNo = mysqli_query($euceventMysqli,$CheckRNoSQL) or die(mysqli_error($euceventMysqli));
		if(mysqli_num_rows($CheckRNo) > 0)
		{
			$Output = 'certs_print/attendance_record/index.php?R='.$Rno.'';
			echo $Output;
			// echo "Success";
		}
		else
		{
			echo 0;
		}
	}
	else
	{
		echo "Failed";
	}
?>