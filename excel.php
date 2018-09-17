<?php

	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=/Export".DATE("Y-m-d").".xls/");

	echo $_GET['data'];
?>