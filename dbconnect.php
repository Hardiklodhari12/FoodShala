<?php

	$con = mysqli_connect("localhost", "root", "");
	if(!$con)
	{
		die('Connection Problem ! --> '.mysqli_error($con));
	}
	if(!mysqli_select_db($con,"foodshala"))
	{
		die('Database Selection Problem ! --> '.mysqli_error($con));
	}

?>