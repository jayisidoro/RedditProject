<?php
/*
Enters the the username into the database and creates a salt and hash for this user as well as 
setting default values for the user's info
*/
    /*
    function for generating a random salt
    */
    function generateSalt()
    {
        $characters = '012345678abcdef';
        $length = 64;
    
        $string = '';
        for ($max = mb_strlen($characters) -1, $i = 0; $i <$length; ++$i)
        {
            $string.= mb_substr($characters, mt_rand(0_rand(0, $max), 1);
        }
        return $string;
    }
    
    $a = $_GET;     //used for easy referencing to $_GET
    
    /*
    uses the get function to retrieve the username and password entered in New.php and assigns
    them to easy referencing variables then generates a random salt and hash using this salt.
    */
    $user = $a['username'];
    $pwd = $a['password'];
    $salt = generateSalt();
    $hash = hash_hmac("sha256", $pwd, $salt);
    
    include('Connect.php');     //connects to database
    
    /*
    checks if the user is in the database.
    if another user is found with the same username as the current user than it redirects to
    New.php if not the user is added to the database and redirects to Login.php
    */
    $found = mysqli_num_rows(mysqli_query($con,"SELECT * FROM students WHERE username = $user"));
    if($found > 0)
    {
        /*
        redirects to Students.php with the message "User already exists!"
        */
        header('Location: New.php?msg=User%20already%20exists!');
    }
    else 
    {
        /*
        adds the user to the database using the username, salt and hash then sets default
        values for the user's info
        */
        mysqli_query($con,"INSERT INTO students (username, salt, hash) VALUES ($user, $salt, $hash)");
        
        /*
        mysqli_query($con,"UPDATE students SET firstname = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET lastname = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET sex = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET studentnumber = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET email = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET degree = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET major = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET minor = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET experience = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET skills = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET fblacklist1 = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET fblacklist2 = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET fblacklist3 = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET lblacklist1 = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET lblacklist2 = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET lblacklist3 = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET busydays = 'N/A' WHERE username = $user");
        mysqli_query($con,"UPDATE students SET project = 'N/A' WHERE username = $user");
        */
        
        /*
        redirects to Students.php with the message "Account created!"
        */
        header('Location: Login.php?msg=Account%20created!');
    }
?>