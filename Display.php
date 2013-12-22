<!DOCTYPE html>
<!--Displays the user's info and gives button redirects to Logout.php and Form.php-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Display</title>
    </head>
    <body>
        <?php
        	include('Connect.php');     //connects to database
      
        	session_start();    //starts session so that database can be accessed at a certain username
        	$b = $_SESSION;     //used for easy referencing to $_SESSION
	        
	        /*
	        sets the info to easy referencing variables for a specific user
	        */
        	$dbfirstname = mysqli_query($con,"SELECT firstname FROM students WHERE username = $b['user']");
        	$dblastname = mysqli_query($con,"SELECT lastname FROM students WHERE username = $b['user']");
        	$dbsex = mysqli_query($con,"SELECT sex FROM students WHERE username = $b['user']");
        	$dbstudentnumber = mysqli_query($con,"SELECT studentnumber FROM students WHERE username = $b['user']");
        	$dbemail = mysqli_query($con,"SELECT email FROM students WHERE username = $b['user']");
            $dbdegree = mysqli_query($con,"SELECT degree FROM students WHERE username = $b['user']");
            $dbmajor = mysqli_query($con,"SELECT major FROM students WHERE username = $b['user']");
            $dbminor = mysqli_query($con"SELECT minor FROM students WHERE username = $b['user']");
            $dbexperience = mysqli_query($con,"SELECT experience FROM students WHERE username = $b['user']");
            $dbskills = mysqli_query($con,"SELECT skills FROM students WHERE username = $b['user']");
            $dbfblacklist1 = mysqli_query($con,"SELECT fblacklist1 FROM students WHERE username = $b['user']");
            $dbfblacklist2 = mysqli_query($con,"SELECT fblacklist2 FROM students WHERE username = $b['user']");
            $dbfblacklist3 = mysqli_query($con,"SELECT fblacklist3 FROM students WHERE username = $b['user']");
            $dblblacklist1 = mysqli_query($con,"SELECT lblacklist1 FROM students WHERE username = $b['user']");
            $dblblacklist2 = mysqli_query($con,"SELECT lblacklist2 FROM students WHERE username = $b['user']");
            $dblblacklist3 = mysqli_query($con,"SELECT lblacklist3 FROM students WHERE username = $b['user']");
            $dbbusydays = mysqli_query($con,"SELECT busydays FROM students WHERE username = $b['user']");
            $dbproject = mysqli_query($con,"SELECT project FROM students WHERE username = $b['user']");
        
            /*
            creates a table and displays the users info vertically
            */
            echo "<table>
                <tr>
                    <td>First Name:</td>
                    <td>". $dbfirstname ."</td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td>". $dblastname ."</td>
                </tr>
                <tr>
                    <td>Sex:</td>
                    <td>". $dbsex ."</td>
                </tr>
                <tr>
                    <td>Student Number:</td>
                    <td>". $dbstudentnumber ."</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>". $dbemail ."</td>
                </tr>
                <tr>
                    <td>Degree:</td>
                    <td>". $dbdegree ."</td>
                </tr>
                <tr>
                   <td>Major:</td>
                   <td>". $dbmajor ."</td>
                </tr>
                <tr>
                    <td>Minor:</td>
                   <td>". $dbminor ."</td>
               </tr>
               <tr>
                   <td>Relevant Experience:</td>
                   <td>". $dbexperience ."/5</td>
               </tr>
               <tr>
                   <td>Applicable Skills:</td>
                   <td>". $dbskills ."</td>
               </tr>
               <tr>
                   <td>Black List:</td>
                   <td>". $dbfblacklist1 ." ". $dblblacklist1 ."<br>
                       ". $dbfblacklist2 ." ". $dblblacklist2 ."<br>
                       ". $dbfblacklist3 ." ". $dblblacklist3 ."</td>
               </tr>
                <tr>
                    <td>Unavailable Days:</td>
                    <td>". $dbbusydays ."</td>
                </tr>
                <tr>
                    <td>Project:</td> 
                    <td>". $dbproject ."</td>
                </tr>
            </table>";
            
            /*
            if there is a message set, it displays the message
            */
            if (isset($_GET['msg'])) 
                echo "<p>".$_GET['msg']."</p>";
        ?>
        
        <!--starts a form that redirects to Form.php when submitted-->
        <form action='Form.php'>
            <input type='submit' value'Change Values?'>
        </form>
        
        <!--starts a form that redirects to Logout.php when submitted-->
        <form action="Logout.php">
            <input type="submit" value="Logout">
        </form>
    </body>
</html>