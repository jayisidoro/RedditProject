<?php
/*
Creates and sends emails to each student informing them of their team number and teammates 
then redirects to Students.php
*/
    include('Connect.php');     //connects to database
    
    $k = 2;     //incrementing variable used for looping through database
    $l = 2;     //incrementing variable used for looping through database
    
    /*
    loops through database and for each user composes an email and sends it 
    */
    while($k <= (mysqli_num_rows(mysqli_query($con, "SELECT * FROM students"))))
    {
        /*
        formats email and sets a first and last name for the current user as well as a basic
        message
        */
        $to = mysqli_query($con,"SELECT email FROM students WHERE rows = $k");
        $subject = "COSC 360 Project Team rows";
        $team = mysqli_query($con,"SELECT team FROM students WHERE rows = $k");
        $fname = mysqli_query($con,"SELECT firstname FROM students WHERE rows = $k");
        $lname = mysqli_query($con,"SELECT lastname FROM students WHERE rows = $k");
        $message = "Hello ". $fname ." ". $lname .", your project team number is". $team .". Your team members are: ";
        
        /*
        int value used for formatting so that a "," appears on every message concat 
        besides the first one
        */
        $firstTeamate = true;
        
        /*
        loops through database and tests for any other users with the same team # that isnt 
        the current user, concatenating the names of any that are found to the email's
        message
        */
        while($l <= (mysqli_num_rows(mysqli_query($con, "SELECT * FROM students"))))
        {
            /*
            sets the testing user info
            */
            $member = mysqli_query($con,"SELECT team FROM students WHERE rows = $l");
            $tfname = mysqli_query($con,"SELECT firstname FROM students WHERE rows = $l");
            $tlname = mysqli_query($con,"SELECT lastname FROM students WHERE rows = $l");
            
            /*
            tests if the team #'s match and that the testing user isnt the current user.
            if the test passes then the testing user's first and last name are concatenated
            to the email's message
            */
            if($team === $member && ($fname !== $tfname && $lname !== $tlname) )
            {
                /*
                used for formatting the message of the email so that "," only appears after
                the first concatenate of the message
                */
                if($firstTeammate)
                {
                    $message = $message . $tfname ." ". $tlname;
                }
                else
                {
                    $message = $message .", ". $tfname ." ". $tlname;
                }
                $firstTeammate = false;
            }
            $l = $l + 1;
        }
        
        /*
        finishes the message and adds a from then sends the email to the student
        */
        $message = $message .".\n\n\tYves Lucet";
        $from = "yves.lucet@ubc.ca";
        $headers = "From:" . $from;
        mail($to,$subject,$message,$headers);
        $k = $k + 1;
    }
    
    /*
    redirects to Students.php with the message "Emails Sent!"
    */
    header('Location: Students.php?msg=Emails%20sent!');
?>