<?php
	session_start();
	session_destroy();
	$header = 'Location:/euc_regi/index.php';
	header($header);
?>