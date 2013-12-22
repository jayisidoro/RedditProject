<!DOCTYPE html>
<!--Landing/start page where user logs in with a username and password.
    Also gives button redirect to create a new account (New.php)-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Login</title>
	</head>
	<body>
	    <!--starts a form that redirects to Validate.php when submitted with entered values-->
    	<form action="Validate.php">
        	Enter your username and password below then click login.
            <br>
            Username: 
    		<input type="text" name="username" id="username">
            <br>
            Password:
    		<input type="password" name="password" id="password">
			<br>
            <input type="submit" value="Login">
        </form>
        
        <!--if there is a message set, it displays the message-->
        <?php
            if (isset($_GET['msg'])) 
                echo "<p>".$_GET['msg']."</p>";
        ?>
        
        <!--starts a form that redirects to New.php when submitted-->
        <form action="New.php">
            To create a new account
            <input type="submit" value="Click Here">
        </form>
	</body>
</html>