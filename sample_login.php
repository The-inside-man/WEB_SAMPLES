<?php
	$usrname = "USERNAME FOR DATABASE";
	$pass = "PASSWORD TO DATABASE!";
	$hostname = "HOST NAME GOES HERE";
	$usertable = "USER TABLE HERE";
	$dbname = "DB NAME HERE";


	mysql_connect($hostname, $usrname, $pass) OR DIE ("Unable to
    connect to database! Please try again later.");
    mysql_select_db($dbname);

	if((isset($_POST['username']))&&(isset($_POST['password']))){ // Verifies that the username and password fields have been entered
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = htmlspecialchars($username);
		$password = htmlspecialchars($password);
		$username = mysql_real_escape_string($username);  		// Makes the variables safe before sending to MySql DB
		$password = mysql_real_escape_string($password);			// Makes the variables safe before sending to MySql DB

		$query  = "SELECT * FROM $usertable WHERE username = '$username' AND password = '$password';"; // Get the data via sql query

		$result = mysql_query($query) or die(mysql_error()); // store the result

		if($result){ // means the query was successful

			$num_rows = mysql_num_rows($result); // get the number of rows returnd from the query

			if($num_rows > 0){  // If greater than 0 means we found a match and start a session for that user
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				header("Location: profile.php");	// relocate to the new logged in page (profile.php in this example)
			}
			else{	// no user found
				?>
        		<script type="text/javascript">
            		alert("Invalid username or password...");
            		history.back();
        		</script>
        		<?php
			}
		}
		else  // failed to run the query
		{
		echo "failed";
		}
	}
	else{		// user name already exists
		?>
        <script type="text/javascript">
            alert("Username Already Exists...");
            history.back();
        </script>
        <?php
	}
?>
