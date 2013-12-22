<!DOCTYPE html>
<!--Creates a form that takes user input and sends the values to Add.php.
    Also takes picture of the user-->**
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Form</title>
		<script>

            var videoElement = document.getElementById('webcam');

            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

            navigator.getUserMedia
            (
                {
                    video: true,
                    audio: true
                }, 
                function(localMediaStream) 
                    {
                        videoElement.src = window.URL.createObjectURL(localMediaStream);
                            // Note: onloadedmetadata doesn't fire in Chrome when using it with getUserMedia.
                            // See crbug.com/110938.
                        videoElement.onloadedmetadata = function(e) 
                            {
                                console.log('Something happened. Do some stuff');
                            };
                    }, function(e)
                        {
                            if (e.code === 1) 
                                {
                                    console.log('User declined permissions.');
                                }
                        }
            );
		</script>
	</head>
	<body>
	    <video id="webcam"></video>
     	
     	<!--starts a form that redirects to Add.php when submitted with entered values-->
     	<form action="Add.php">
     	    
     	    <!--creates a table with form inputs to change the user's info-->
    	    <table>
    	        <tr>
    	            <td>First Name:</td>
    	            <td><input type="text" value="fill in first name" name="firstname" id="firstname"></td>
    	        </tr>
    	        <tr>
    	            <td>Last Name:</td>
    	            <td><input type="text" value="fill in last name" name="lastname" id="lastname"></td>
    	        </tr>
    	        <tr>
    	            <td>Sex:</td>
    	            <td><input type="radio" name="sex" id="sex" value="M">Male<br>
    	                <input type="radio" name="sex" id="sex" value="F">Female</td>
    	        </tr>
    	        <tr>
    	            <td>Student Number:</td>
    	            <td><input type="text" value="fill in student number" name="studentnumber" id="studentnumber"></td>
    	        </tr>
    	        <tr>
    	            <td>Email:</td>
    	            <td><input type="text" value="fill in email" name="email" id="email"></td>
    	        </tr>
    	        <tr>
    	            <td>Degree:</td>
    	            <td><input type="radio" name="degree" value="BA">BA<br>
    	                <input type="radio" name="degree" value="BSc">BSc</td>
    	        </tr>
    	        <tr>
    	            <td>Major:</td>
    	            <td><input type="text" value="fill in major" name="major" id="major"></td>
    	        </tr>
    	        <tr>
    	            <td>Minor:</td>
    	            <td><input type="text" value="fill in minor" name="minor" id="minor"></td>
    	        </tr>
    	        <tr>
    	            <td>Relevant Experience:</td>
    	            <td><input type="radio" name="experience" value="1">1 (no experience outside courses)<br>
    	                <input type="radio" name="experience" value="2">2<br>
    	                <input type="radio" name="experience" value="3">3<br>
    	                <input type="radio" name="experience" value="4">4<br>
    	                <input type="radio" name="experience" value="5">5 (professional consultant)</td>
    	        </tr>
    	        <tr>
    	            <td>Applicable Skills:</td>
    	            <td><input type="text" value=$dbskills name="skills" id="skills"></td>
    	        </tr>
    	        <tr>
    	            <td>Black List:</td>
    	            <td>1. <input type="text" value="fill in first name" name="fblacklist1" id="fblacklist1">
    	                <input type="text" value="fill in last name" name="lblacklist1" id="lblacklist1"><br>
    	                2. <input type="text" value="fill in first name" name="fblacklist2" id="fblacklist2">
    	                <input type="text" value="fill in last name" name="lblacklist2" id="lblacklist2"><br>
    	                3. <input type="text" value="fill in first name" name="fblacklist3" id="fblacklist3">
    	                <input type="text" value="fill in last name" name="lblacklist3" id="lblacklist3"></td>
    	        </tr>
    	        <tr>
    	            <td>Unavailable Days:</td>
    	            <td><input type="checkbox" name="busydays[]" value="Sunday">Sunday<br>
    	                <input type="checkbox" name="busydays[]" value="Monday">Monday<br>
    	                <input type="checkbox" name="busydays[]" value="Tuesday">Tuesday<br>
        	            <input type="checkbox" name="busydays[]" value="Wednesday">Wednesday<br>
        	            <input type="checkbox" name="busydays[]" value="Thursday">Thursday<br>
        	            <input type="checkbox" name="busydays[]" value="Friday">Friday<br>
        	            <input type="checkbox" name="busydays[]" value="Saturday">Saturday</td>
    	        </tr>
    	        <tr>
    	            <td>Project:</td> 
    	            <td><input type="radio" value="1" name="project" id="project">Project 1<br>
    	                <input type="radio" value="2" name="project" id="project">Project 2
    	            </td>
    	        </tr>
            </table>
            <input type="submit" value="Change">
        </form>
	</body>
</html>