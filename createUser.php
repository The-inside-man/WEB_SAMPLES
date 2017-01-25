<?php


	$usrname = "USERNAME FOR DATABASE";
	$pass = "PASSWORD TO DATABASE!";
	$hostname = "HOST NAME GOES HERE";
	$usertable = "USER TABLE HERE";
	$dbname = "DB NAME HERE";


	mysql_connect($hostname, $usrname, $pass) OR DIE ("Unable to
    connect to database! Please try again later.");
    mysql_select_db($dbname);


	$usrnm = $_POST['username'];
	$email = $_POST['email'];
	$passwd = $_POST['password'];
	$con_p = $_POST['confirmPassword'];
	$con_e = $_POST['confirmEmail'];


    $chkUserE = "SELECT * FROM $usertable WHERE email = '$email';";
    $chkUser = "SELECT * FROM $usertable WHERE username = '$usrnm';";
	$rslt = mysql_query($chkUser);
	$rsltE = mysql_query($chkUserE);
	if(mysql_num_rows($rsltE) > 0){
        ?>
        <script type="text/javascript">
        	alert("Email already Exists...");
        	history.back();
        </script>
        <?php
    }
	if(mysql_num_rows($rslt) > 0){
		?>
        <script type="text/javascript">
            alert("Username already Exists...");
            history.back();
        </script>
        <?php
	}else {


	if($_POST['username'] == "" || $_POST['email'] =="" || $_POST['password'] =="" || $_POST['confirmPassword'] == "" || $_POST['confirmEmail'] ==""){
		?>
		<script type="text/javascript">
            alert("Please make sure all fields are entered...");
            history.back();
        </script>
        <?php
	}else {
	if(strcmp($passwd,$con_p) != 0 || strcmp($email,$con_e) != 0){
		?>
		<script type="text/javascript">
            alert("Username or Passwords dont match. Please try again.");
            history.back();
        </script>
        <?php
	}else {
		//add new user
		$query = "INSERT INTO $usertable (username, password, email) VALUES ('$usrnm', '$passwd', '$email');";
		$result = mysql_query($query);
		$query2  = "SELECT * FROM $usertable WHERE username = '$usrnm' AND password = '$passwd';";
		$result2 = mysql_query($query2) or die(mysql_error());
		if($result && $result2){

			$num_rows = mysql_num_rows($result2);
			if($num_rows > 0){
				session_start();

				$_SESSION['username'] = $usrnm;
				$_SESSION['password'] = $passwd;
				header("Location: profile.php");
			}
			else{
				?>
        		<script type="text/javascript">
            		alert("something went wrong...");
            		history.back();
        		</script>
        		<?php
			}
		}
		else
		{
		echo "failed to update user table...";
		}
	}
	}
}
?>
