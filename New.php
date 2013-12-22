<!DOCTYPE html>
<!--Creates a form that takes user inputted username and password and sends to Enter.php.
    Also allows button redirection to Login.php-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>New</title>
	</head>
	<body>
	    
	    <!--starts a form that redirects to Enter.php when submitted with entered values-->
    	<form action="Enter.php">
        	Enter a username and password below then click create.
            <br>
            Username: 
    		<input type="text" name="username" id="username">
            <br>
            Password:
    		<input type="text" name="password" id="password">
			<br>
            <input type="submit" value="Create">
        </form>
        
        <!--if there is a message set, it displays the message-->
        <?php
            if (isset($_GET['msg'])) 
                echo "<p>".$_GET['msg']."</p>";
        ?>
        
        <!--starts a form that redirects to Login.php when submitted-->
        <form action="Login.php">
            Go back to login? <input type="submit" value="Click Here">
        </form>
	</body>
</html>