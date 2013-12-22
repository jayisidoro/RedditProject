<?php
/*
Logs out of the user's account by ending the session and closing the database connection
*/
	session_start();    //starts session so that it can end the session
	session_destroy();      //ends the session by destroying it
	
	include('Connect.php');     //connects to database
	mysqli_close($con);     //closes the connection to the database
	
	/*
    redirects to Login.php with the message "Logout successful!"
    */
	header('Location: Login.php?msg=Logout%20successful!');
?>