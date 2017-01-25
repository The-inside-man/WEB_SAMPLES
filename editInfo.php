<?php

	session_start();
	if(!isset($_SESSION['username'])){
		?>
    		<script type="text/javascript">
    			alert("You Must be logged to make these changes...");
    			history.back();
    		</script>
    	<?php
	}

	$usrname = "USERNAME FOR DATABASE";
	$pass = "PASSWORD TO DATABASE!";
	$hostname = "HOST NAME GOES HERE";
	$usertable = "USER TABLE HERE";
	$dbname = "DB NAME HERE";

    $email = $_POST["email"];
    $myPic = $_POST["picNm"];

    $pic = $_POST["proPic"];

    $school = $_POST["school"];
    $program = $_POST["program"];
    $city = $_POST["city"];
    $languages = $_POST["languages"];

	$username = $_SESSION['username'];
	$img = "";
	mysql_connect($hostname, $usrname, $pass) OR DIE ("Unable to
    connect to database! Please try again later.");
    mysql_select_db($dbname);


    $email = mysql_real_escape_string($email);
    $school = mysql_real_escape_string($school);
    $program = mysql_real_escape_string($program);
    $city = mysql_real_escape_string($city);
    $languages = mysql_real_escape_string($languages);

    $query = "UPDATE $usertable SET email='$email', school='$school', picture='profile_pictures/$pic', program='$program', city='$city', languages='$languages' WHERE username = '$username' ; ";


    $result = mysql_query($query);

    if($result){
		header("location: http://www.myprintf.com/profile.php");
    }
    else{
    	echo "There was an error";
    }

?>
