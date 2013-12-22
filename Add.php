<?php
/*
Adds the values that were entered in Form.php to the database for that specific user then
redirects to Display.php
*/
    session_start();    //starts session so that database can be accessed at a certain username
	$b = $_SESSION;     //used for easy referencing to $_SESSION
    
    $a = $_GET;     //used for easy referencing to $_GET
    
    /*
    retrieves values from Form.php using the get function and assigns variables for easy 
    referencing
    */
    $firstname = $a['firstname'];
    $lastname = $a['lastname'];
    $sex = $a['sex'];
    $studentnumber = $a['studentnumber'];
    $email = $a['email'];
    $degree = $a['degree'];
    $major = $a['major'];
    $minor = $a['minor'];
    $experience = $a['experience'];
    $skills = $a['skills'];
    $fblacklist1 = $a['fblacklist1'];
    $fblacklist2 = $a['fblacklist2'];
    $fblacklist3 = $a['fblacklist3'];
    $lblacklist1 = $a['lblacklist1'];
    $lblacklist2 = $a['lblacklist2'];
    $lblacklist3 = $a['lblacklist3'];
    $busydays = $a['busydays'];
    $project = $a['project'];
    
    include('Connect.php');     //connects to database
    
    /*
    updates the values entered in Form.php to the database for the specific user
    */
    mysqli_query($con,"UPDATE students SET firstname = $firstname WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET lastname = $lastname WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET sex = $sex WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET studentnumber = $studentnumber WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET email = $email WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET degree = $degree WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET major = $major WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET minor = $minor WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET experience = $experience WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET skills = $skills WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET fblacklist1 = $fblacklist1 WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET fblacklist2 = $fblacklist2 WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET fblacklist3 = $fblacklist3 WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET lblacklist1 = $lblacklist1 WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET lblacklist2 = $lblacklist2 WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET lblacklist3 = $lblacklist3 WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET busydays = $busydays WHERE username = $b['user']");
    mysqli_query($con,"UPDATE students SET project = $project WHERE username = $b['user']");

    /*
    redirects to Students.php with the message "Teams changed!"
    */
    header('Location: Display.php?msg=Values%20changed!');
?>