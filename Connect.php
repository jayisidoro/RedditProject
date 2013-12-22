<?php
/*
Provides an easy way to connect to the database
*/
    /*
    assigns database info to easy referencing variables
    */
	$host = "localhost";
	$user = "root";
	$password = "root";

    /*
    connects to database
    */
	$con = mysqli_connect($host, $user, $password);

    /*
    if the connection fails an error message is displayed
    */
	if (mysqli_connect_errno($con))
	{
	    echo "Connection failed". mysqli_connect_error();
	}
?>