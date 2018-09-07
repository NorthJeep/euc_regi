<?php
include('config.php');

	$Amount = $_POST['Amount'];
	$Rno = $_POST['Rno'];

	$PayInsertSQL = 'INSERT INTO tbl_t_payment(Payment_Amount,Payment_Date,Registration_No) VALUES ('.$Amount.',CURRENT_DATE,'.$Rno.')';
	$PayInsert = mysqli_query($euceventMysqli,$PayInsertSQL) or die(mysqli_error($euceventMysqli));

	// $SelectPaymentSQL = 'SELECT tbl_t_payment.Payment_ID,
	// 							tbl_t_payment.Payment_Amount,
	// 							tbl_t_payment.Payment_Date,
	// 							tbl_t_payment.Registration_No,
	// 							tbl_t_registrant.First_Name,
	// 							tbl_t_registrant.Middle_Name,
	// 							tbl_t_registrant.Last_Name,
	// 							tbl_t_registrant.Ext_Name,
	// 							tbl_t_registrant.Company
	// 					FROM tbl_t_payment
	// 					INNER JOIN tbl_t_registration
	// 						ON tbl_t_payment.Registration_No = tbl_t_registration.Registration_No
	// 					INNER JOIN tbl_t_registrant
	// 						ON tbl_t_registration.Registrant_ID = tbl_t_registrant.Registrant_ID
	// 					ORDER BY tbl_t_payment.Payment_ID DESC LIMIT 1';
	// $SelectPayment =  mysqli_query($euceventMysqli,$SelectPaymentSQL) or die(mysqli_error($euceventMysqli));
				
	// 			if(mysqli_num_rows($SelectPayment) > 0)
	// 			{
	// 				while($row = mysqli_fetch_assoc($SelectPayment))
	// 				{
	// 				}
	// 			}

	$SelectPaymentSQL = 'SELECT MAX(tbl_t_payment.Payment_ID) AS Payment_ID FROM tbl_t_payment';
	$SelectPayment =  mysqli_query($euceventMysqli,$SelectPaymentSQL) or die(mysqli_error($euceventMysqli));
				
				if(mysqli_num_rows($SelectPayment) > 0)
				{
					while($row = mysqli_fetch_assoc($SelectPayment))
					{
						$SelectPaymentID = $row['Payment_ID'];
					}
				}
	echo  "OfficialReceipt_Print.php?R=".$RID."";

?>
