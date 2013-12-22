<?php
/*
Attempts to optimize the teams so that they have an equal number of boys and girls, a good 
average experience, and an equal number of BA students and BSc students
*/
    include('Connect.php');     //connects to database
    
    $g = 2;     //incrementing variable used for looping through database
    $teamnumber = 1;    //incrementing team # variable to assign multiple teams
    
    /*
    initializes the team # of all students to 0
    */
    while($g <= (mysqli_num_rows(mysqli_query($con, "SELECT * FROM students"))))
    {
        /*
        sets the team # of the student at the incrementing variable to 0
        */
        mysqli_query($con,"UPDATE students SET team = '0' WHERE rows = $g");
    }
    
    while((mysqli_num_rows(mysqli_query($con, "SELECT * FROM students WHERE team = '0'"))) > 0)
    {
        $h = 2;     //incrementing variable used for looping through database
        
        /*
        
        */
        while($h <= (mysqli_num_rows(mysqli_query($con, "SELECT * FROM students"))))
        {
            if(mysqli_query($con,"SELECT team FROM students WHERE rows = $h") === 0)
            {
                
                mysqli_query($con,"UPDATE students SET team = $teamnumber WHERE rows = $h");
                
                $experience = mysqli_query($con,"SELECT experience FROM students WHERE rows = $h");
                if($experience === 1)
                    $E = -2;
                if($experience === 2)
                    $E = -1;
                if($experience === 3)
                    $E = 0;
                if($experience === 4)
                    $E = 1;
                if($experience === 5)
                    $E = 2;
                    
                $degree = mysqli_query($con,"SELECT degree FROM students WHERE rows = $h");
                if($degree === "BA")
                    $D = -1;
                if($degree === "BSc")
                    $D = 1;
                
                $sex = mysqli_query($con,"SELECT sex FROM students WHERE rows = $h");
                if($sex === "F")
                    $S = -1;
                if($sex === "M")
                    $S = 1;
                
                $z = 2;
                while($z <= (mysqli_num_rows(mysqli_query($con, "SELECT * FROM students"))))
                {
                    $desiredE = $E*-1;
                    $desiredD = $D*-1;
                    $desiredS = $S*-1;
                    
                    if((mysqli_num_rows(mysqli_query($con, "SELECT * FROM students WHERE team = $teamnumber"))) !== 4)
                    {
                        if((mysqli_num_rows(mysqli_query($con, "SELECT team FROM students WHERE rows = $z"))) !== 0)
                        {
                            $TESTexperience = mysqli_query($con,"SELECT experience FROM students WHERE rows = $z");
                            if($TESTexperience === 1)
                                $testE = -2;
                            if($TESTexperience === 2)
                                $testE = -1;
                            if($TESTexperience === 3)
                                $testE = 0;
                            if($TESTexperience === 4)
                                $testE = 1;
                            if($TESTexperience === 5)
                                $testE = 2;
                                
                            $TESTdegree = mysqli_query($con,"SELECT degree FROM students WHERE rows = $z");
                            if($TESTdegree === "BA")
                                $testD = -1;
                            if($TESTdegree === "BSc")
                                $testD = 1;
                            
                            $TESTsex = mysqli_query($con,"SELECT sex FROM students WHERE rows = $z");
                            if($TESTsex === "F")
                                $testS = -1;
                            if($TESTsex === "M")
                                $testS = 1;
                                
                            if(($desiredE === $testE) && ($desiredD === $testD) && ($desiredS === $testS))
                            {
                                $E = $E + $testE
                                $E = $E + $testE
                                $E = $E + $testE
                                
                                mysqli_query($con,"UPDATE students SET team = $teamnumber WHERE rows = $z");
                            }
                            else
                            {
                                if()
                                {
                                    /*
                                    didnt have time to complete it is supposed to test for 1 of the desired values
                                    then 2 off then 3 and so forth and updates the team with the student that best matches
                                    */
                                }
                            }
                        }
                    }
                    else
                    {
                        $teamnumber = $teamnumber + 1;
                    }
                    $z = $z + 1;
                }
            }
            $h = $h + 1;
        }
        $teamnumber = $teamnumber + 1;
    }
    
    /*
    redirects to Students.php with the message "Teams changed!"
    */
    header('Location: Students.php?msg=Teams%20changed!');
?>