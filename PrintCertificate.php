<?php
	include('config.php');
	if(isset($_POST['Rno']))
	{
		$Rno = $_POST['Rno'];

		$CheckRNoSQL = 'SELECT * FROM tbl_t_registration WHERE Registration_No = '.$Rno.' ';
		$CheckRNo = mysqli_query($euceventMysqli,$CheckRNoSQL) or die(mysqli_error($euceventMysqli));
		if(mysqli_num_rows($CheckRNo) > 0)
		{
			$Output = 'certs_print/attendance_record/index.php?R='.$Rno.'';
			echo $Output;
			// echo "Success";
		}
		else
		{
			echo "Registration number does not exists.";
		}
	}
	else
	{
		echo "Failed";
	}
?>