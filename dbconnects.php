<?php
	//connection database to the system
	$dbcs=mysqli_connect("localhost","root","","accsrsrpt");
	if(mysqli_connect_errno())
	{
		echo "Problem In Database Connection".mysqli_connect_error($dbc);
	}
?>