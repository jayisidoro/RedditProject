<?php
/*
Validates the username and password with the database values to see if the user exists and 
that the password matches with the username.
Then tests if the user is the professor or a student and redirects to Students.php or 
Display.php respectively.
Also redirects to Login.php if password is incorrect
*/
    /*
    function for testing the password of the user against the hash stored in the database for 
    the same username
    */
    function testPassword($fpwd, $fdbsalt, $fdbhash)
    {
        if (hash_hmac("sha256", $fpwd, $fdbsalt) === $fdbhash)
        {
            return(true);
        }
        else
        {
            return(false);
        }
    }
    
    $a = $_GET;     //used for easy referencing to $_GET
    
    /*
    retrieves the username and password from Login.php and assigns them to easy referencing 
    variables
    */
    $user = $a['username'];
    $pwd = $a['password'];
  
    include('Connect.php');     //connects to database
    
    /*
    checks if the user is in the database.
    if username is found then redirects to Login.php
    */
    $found = mysqli_num_rows(mysqli_query($con,"SELECT * FROM students WHERE username = $user"));
    if($found < 1)
    {
        /*
        redirects to Login.php with the message "Username incorrect!"
        */
        header('Location: Login.php?msg=Username%20incorrect!');
    }
    else
    {
        /*
        assigns database values for the hash and salt at the specific user to easy referencing
        variables
        */
        $dbsalt = mysqli_query($con,"SELECT salt FROM students WHERE username = $user");
        $dbhash = mysqli_query($con,"SELECT hash FROM students WHERE username = $user");
    
        /*
        uses the testPassword function to test the user's password against the database hash.
        If the test passes then the username is assigned to a session variable for global use
        and redirects to either Student.php or Display.php.
        If the test fails then redirects to Login.php
        */
        if(testPassword($pwd, $dbsalt, $dbhash)
        {
            session_start();    //starts session so that database can be accessed at a certain username
            $b = $_SESSION;     //used for easy referencing to $_SESSION
            $b['user'] = $user;     //assigns username to session variable for global use
            
            /*
            tests if the user is the professor.
            if the user is the professor than redirects to Student.php, if not then redirects to
            Display.php
            */
            if($user === "00000000")
            {
                /*
                redirects to Student.php
                */
                header('Location: Students.php');
            }
            else
            {
                /*
                redirects to Display.php
                */
                header('Location: Display.php');
            }
        }
        else 
        {
            /*
            redirects to Login.php with the message "Password incorrect!"
            */
            header('Location: Login.php?msg=Password%20incorrect!');
        }
    }
?>