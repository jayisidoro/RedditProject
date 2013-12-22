<?php
/*
Assigns users to random teams while respecting each of their blacklists then redirects to
Student.php
*/
    include('Connect.php');     //connects to database
    
    $c = 2;     //incrementing variable used for looping through database
    
    /*
    loops through the database assigning users to random teams and testing their banlists 
    against each other
    */
    while($c <= (mysqli_num_rows(mysqli_query($con, "SELECT * FROM students"))))
    {
        /*
        assigns the user's name and blacklist names at the database row of the incrementing
        variable to easy referencing variables
        */
        $fn = mysqli_query($con,"SELECT firstname FROM students WHERE rows = $c");
        $ln = mysqli_query($con,"SELECT lastname FROM students WHERE rows = $c");
        
        $fbl1 = mysqli_query($con,"SELECT fblacklist1 FROM students WHERE rows = $c");
        $fbl2 = mysqli_query($con,"SELECT fblacklist2 FROM students WHERE rows = $c");
        $fbl3 = mysqli_query($con,"SELECT fblacklist3 FROM students WHERE rows = $c");
        $lbl1 = mysqli_query($con,"SELECT lblacklist1 FROM students WHERE rows = $c");
        $lbl2 = mysqli_query($con,"SELECT lblacklist2 FROM students WHERE rows = $c");
        $lbl3 = mysqli_query($con,"SELECT lblacklist3 FROM students WHERE rows = $c");
        
        $bl = false;    //sets a testing variable
        
        /*
        sets a random variable and tests the user's banlist against the test user's name and 
        the test user's banlist against the user's name
        */
        while($bl === false)
        {
            $r = rand(1,8);     //sets a random variable based on the max number of teams
            
            /*
            assigns the testing user's name and blacklist names at the database row of the 
            random variable to easy referencing variables
            */
            $teamfn = mysqli_query($con,"SELECT firstname FROM students WHERE team = $r");
            $teamln = mysqli_query($con,"SELECT lastname FROM students WHERE team = $r");
            
            $teamfbl1 = mysqli_query($con,"SELECT fblacklist1 FROM students WHERE team = $r");
            $teamfbl2 = mysqli_query($con,"SELECT fblacklist2 FROM students WHERE team = $r");
            $teamfbl3 = mysqli_query($con,"SELECT fblacklist3 FROM students WHERE team = $r");
            $teamlbl1 = mysqli_query($con,"SELECT lblacklist1 FROM students WHERE team = $r");
            $teamlbl2 = mysqli_query($con,"SELECT lblacklist2 FROM students WHERE team = $r");
            $teamlbl3 = mysqli_query($con,"SELECT lblacklist3 FROM students WHERE team = $r");
            
            /*
            tests the user's banlist against the name of the testing user.
            if test passes continue testing
            */
            if((($fbl1 || $fbl2 || $fbl3) !== $teamfn) && (($lbl1 || $lbl2 || $lbl3) !== $teamln))
            {
                /*
                tests the test user's banlist against the name of the user.
                if the test passes mark the testing variable as true to exit the loop
                */
                if(($fn !== ($teamfbl1 || $teamfbl2 || $teamfbl3)) && ($ln !== ($teamlbl1 || $teamlbl2 || $teamlbl3)))
                {
                    $bl === true;
                }
            }
        }
        
        /*
        sets the random variable to be the user's team #
        */
        mysqli_query($con,"UPDATE students SET team = $r WHERE rows = $c");
        $c = $c + 1;
    }
    
    /*
    redirects to Students.php with the message "Teams changed!"
    */
    header('Location: Students.php?msg=Teams%20changed!');
?>