<!DOCTYPE html>
<!--Displays every students info in a table format and allows a button redirect to Manual.php, 
    Random.php, Optimal.php and Logout.php-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Form</title>
	</head>
	<body>
	    <?php
	        include('Connect.php');     //connects to database
	        
	        $i = 2;     //incrementing variable used for looping through database
            
            /*
            creates table and sets the specific headers: #, FirstName, Last Name, Sex
            Student Number, Email, Degree, Major, Minor, Experience, Skills, Blacklist, 
            Busy Days, Project, Team #
            */
	        echo"<table><tr><th>#</th><th>First Name</th><th>Last Name</th><th>Sex</th><th>Student Number</th><th>Email</th><th>Degree</th><th>Major</th><th>Minor</th><th>Experience</th><th>Skills</th><th>Blacklist</th><th>Busy Days</th><th>Project</th><th>Team #</th></tr>";
	            
	            /*
                loops through the database and displays each user's info
	            */
	            while($i <= (mysqli_num_rows(mysqli_query($con, "SELECT * FROM students"))))
                {
                    /*
        	        sets the info of student at the row of the incrementing variable to easy 
        	        referencing variables
        	        */
                    $dbfirstname = mysqli_query($con,"SELECT firstname FROM students WHERE rows = $i");
	                $dblastname = mysqli_query($con,"SELECT lastname FROM students WHERE rows = $i");
	                $dbsex = mysqli_query($con,"SELECT sex FROM students WHERE rows = $i");
	                $dbstudentnumber = mysqli_query($con,"SELECT studentnumber FROM students WHERE rows = $i");
        	        $dbemail = mysqli_query($con,"SELECT email FROM students WHERE rows = $i");
                    $dbdegree = mysqli_query($con,"SELECT degree FROM students WHERE rows = $i");
                    $dbmajor = mysqli_query($con,"SELECT major FROM students WHERE rows = $i");
                    $dbminor = mysqli_query($con,"SELECT minor FROM students WHERE rows = $i");
                    $dbexperience = mysqli_query($con,"SELECT experience FROM students WHERE rows = $i");
                    $dbskills = mysqli_query($con,"SELECT skills FROM students WHERE rows = $i");
                    $dbfblacklist1 = mysqli_query($con,"SELECT fblacklist1 FROM students WHERE rows = $i");
                    $dbfblacklist2 = mysqli_query($con,"SELECT fblacklist2 FROM students WHERE rows = $i");
                    $dbfblacklist3 = mysqli_query($con,"SELECT fblacklist3 FROM students WHERE rows = $i");
                    $dblblacklist1 = mysqli_query($con,"SELECT lblacklist1 FROM students WHERE rows = $i");
                    $dblblacklist2 = mysqli_query($con,"SELECT lblacklist2 FROM students WHERE rows = $i");
                    $dblblacklist3 = mysqli_query($con,"SELECT lblacklist3 FROM students WHERE rows = $i");
                    $dbbusydays = mysqli_query($con,"SELECT busydays FROM students WHERE rows = $i");
                    $dbproject = mysqli_query($con,"SELECT project FROM students WHERE rows = $i");
                    $dbteam = mysqli_query($con,"SELECT team FROM students WHERE rows = $i");
                    
                    /*
                    displays the #, FirstName, Last Name, Sex, Student Number, Email, Degree, 
                    Major, Minor, Experience, Skills, Blacklist, Busy Days, Project and 
                    current team #
                    */
                    echo"<tr><td>".$i."</td><td>".$dbfirstname."</td><td>".$dblastname."</td><td>".$dbsex."</td><td>".$dbstudentnumber."</td><td>".$dbemail."</td><td>".$dbdegree."</td><td>".$dbmajor."</td><td>".$dbminor."</td><td>".$dbexperience."</td><td>".$dbskills."</td><td>".$dbfblacklist1." ".$dblblacklist1."<br>".$dbfblacklist2." ".$dblblacklist2."<br>".$dbfblacklist3." ".$dblblacklist3."</td><td>".$dbbusydays."</td><td>".$dbproject."</td><td>".$dbteam."</td></tr>";
                    $i = $i + 1;
                }
            echo"</table>";
            
            /*
            if there is a message set, it displays the message
            */
            if (isset($_GET['msg'])) 
                echo "<p>".$_GET['msg']."</p>";
	    ?>
	    
	    <!--starts a form that redirects to Manual.php when submitted with entered values-->
	    <p>Team Selection:<br>
    	<form action="Manual.php">
            <input type="submit" value="Manual">
        </form>
        
        <!--starts a form that redirects to Random.php when submitted with entered values-->
        <form action="Random.php">
            <input type="submit" value="Random">
        </form>
        
        <!--starts a form that redirects to Optimal.php when submitted with entered values-->
        <form action="Optimal.php">
            <input type="submit" value="Optimal">
        </form>
        
        <!--starts a form that redirects to Logout.php when submitted with entered values-->
        <form action="Logout.php">
            <br><input type="submit" value="Logout">
        </form>
	</body>
</html>

