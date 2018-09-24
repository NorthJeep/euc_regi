<?php
	include('config.php');
	$Text = $_POST['Text'];
	$List = "";

	if($_POST['Text'] != '')
	{
		$List = '<ul class="list-unstyled">'; 
		$CompanySQL = 'SELECT DISTINCT Company FROM tbl_t_registrant WHERE Company LIKE "'.$Text.'%" LIMIT 5';
		$Company = mysqli_query($euceventMysqli,$CompanySQL) or die(mysqli_error($euceventMysqli));
		if(mysqli_num_rows($Company) > 0)
		{
			while($row = mysqli_fetch_assoc($Company))
			{
				$List .= '<li class="company-name">'.$row['Company'].'</li>';
			}
			$List .= '</ul>';
		}
		echo $List;
	}
	
?>