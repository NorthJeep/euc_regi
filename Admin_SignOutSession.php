<?php
	session_start();
	session_destroy();
	session_unset($_SESSION['LoggedIn']);
	$header = 'Location: index.php';
	header($header);
?>