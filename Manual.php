<!DOCTYPE html>
<!--Creates a form display of the students info and allows the user to change the team # value
    of each of the students in a table format-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Manual</title>
	</head>
	<body>
	
	    <!--Starts a form that redirects to Change.php with submitted values-->
	    <form action="Change.php">
	        <?php
	            include('Connect.php');     //connects to database
	        
	            $s = 2;     //incrementing variable used to looping through database
            
                /*
                creates table and sets the specific headers: #, FirstName, Last Name, Sex
                Student Number, Email, Degree, Major, Minor, Experience, Skills, Blacklist, 
                Busy Days, Project, Team #
                */
	            echo"<table><tr><th>rows</th><th>First Name</th><th>Last Name</th><th>Sex</th><th>Student Number</th><th>Email</th><th>Degree</th><th>Major</th><th>Minor</th><th>Experience</th><th>Skills</th><th>Blacklist</th><th>Busy Days</th><th>Project</th><th>Team #</th></tr>";
    	            
    	            /*
    	            loops through the database and displays each user's info with a textfield for
    	            team # input
    	            */
    	            while($s <= (mysqli_num_rows(mysqli_query($con, "SELECT * FROM students"))))
                    {
                        /*
        	            sets the info of student at the row of the incrementing variable to 
        	            easy referencing variables
        	            */
            	        $dbfirstname = mysqli_query($con,"SELECT firstname FROM students WHERE rows = $s");
            	        $dblastname = mysqli_query($con,"SELECT lastname FROM students WHERE rows = $s");
            	        $dbsex = mysqli_query($con,"SELECT sex FROM students WHERE rows = $i");
            	        $dbstudentnumber = mysqli_query($con,"SELECT studentnumber FROM students WHERE rows = $s");
            	        $dbemail = mysqli_query($con,"SELECT email FROM students WHERE rows = $s");
                        $dbdegree = mysqli_query($con,"SELECT degree FROM students WHERE rows = $s");
                        $dbmajor = mysqli_query($con,"SELECT major FROM students WHERE rows = $s");
                        $dbminor = mysqli_query($con,"SELECT minor FROM students WHERE rows = $s");
                        $dbexperience = mysqli_query($con,"SELECT experience FROM students WHERE rows = $s");
                        $dbskills = mysqli_query($con,"SELECT skills FROM students WHERE rows = $s");
                        $dbblacklist = mysqli_query($con,"SELECT blacklist FROM students WHERE rows = $s");
                        $dbbusydays = mysqli_query($con,"SELECT busydays FROM students WHERE rows = $s");
                        $dbproject = mysqli_query($con,"SELECT project FROM students WHERE rows = $s");
                        $dbteam = mysqli_query($con,"SELECT team FROM students WHERE rows = $s");
                    
                        /*
                        displays the #, FirstName, Last Name, Sex, Student Number, Email, 
                        Degree, Major, Minor, Experience, Skills, Blacklist, Busy Days, Project
                        and adds a text field for the Team # so that a team number can be 
                        entered manually assigning a number an incrementing number as the id
                        */
                        echo"<tr><td>".$s."</td><td>".$dbfirstname."</td><td>".$dblastname."</td><td>".$dbsex."</td><td>".$dbstudentnumber."</td><td>".$dbemail."</td><td>".$dbdegree."</td><td>".$dbmajor."</td><td>".$dbminor."</td><td>".$dbexperience."</td><td>".$dbskills."</td><td>".$dbfblacklist1." ".$dblblacklist1."<br>".$dbfblacklist2." ".$dblblacklist2."<br>".$dbfblacklist3." ".$dblblacklist3."</td><td>".$dbbusydays."</td><td>".$dbproject."</td><td><input type='text' id='$s' name='$s' value='$dbteam'></td></tr>";
                        $s = $s + 1;
                    }
                echo"</table>";
    	    ?>
            <input type="submit" value="Change">
        </form> 
	</body>
</html>