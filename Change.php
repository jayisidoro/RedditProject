<?php
/*
Changes the team # values in the database to the values that were entered in Manual.php
then redirects to Students.php
*/
    include('Connect.php');     //connects to database
    
    $a = $_GET;     //used for easy referencing to $_GET
    $j = 2;     //incrementing variable used to looping through database
    
    /*
    loops through the database changing the database team # values for each user to the values 
    entered in Manual.php
    */
    while($j <= (mysqli_num_rows(mysqli_query($con, "SELECT * FROM students"))))
    {
        /*
        using the get function, retrieves the team # values for the incrementing id and sets 
        the database team # to equal this value for the corresponding user with the same # 
        value as the incrementing id
        */
        $team = $a['$j'];
        mysqli_query($con,"UPDATE students SET team = $team WHERE rows = $j");
        $j = $j + 1;
    }
    
    /*
    redirects to Students.php with the message "Teams changed!"
    */
    header('Location: Students.php?msg=Teams%20changed!');
?>