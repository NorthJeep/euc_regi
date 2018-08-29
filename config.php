<?php
	$Server_Host = 'localhost';
	$User = 'root';
	$Pass = '';
	$DB = 'eucevent_db';
	$euceventMysqli = mysqli_connect($Server_Host,$User,$Pass,$DB) or die(mysqli_connect_error());
?>