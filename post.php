<?php

	session_start();
				$host2Name 	= "HOST NAME FOR COMMENT DATABASE";
				$usr2name 	= "USERNAME FOR POSTS DB";
				$db2name 		= "DB NAME FOR POSTS";
				$pass 			= "PASSWORD FOR DB";
				$usertable 	= "USERTABLE FOR POSTS/COMMENTS";

				$usrname = "USERNAME FOR DATABASE";
				$pass = "PASSWORD TO DATABASE!";
				$hostname = "HOST NAME GOES HERE";
				$usertable = "USER TABLE HERE";
				$dbname = "DB NAME HERE";

				$username = $_SESSION['username'];
				$img = "";
				$email = "";
				$link = mysql_connect($hostname, $usrname, $pass2) OR DIE ("Unable to
    			connect to database! Please try again later.");
    			mysql_select_db($dbname);

    			$query = "SELECT * FROM $usertable2 WHERE username = '$username';";
    			$result = mysql_query($query);

    			if($result){
    				$row = mysql_fetch_array($result);

    				$img = $row['picture'];
    			}




            	$username = $_GET['username'];
            	$postedby = $_SESSION['username'];
            	$ipaddress = $_SERVER["REMOTE_ADDR"];
            	$message = $_POST['message'];

            	$queryEm = "SELECT * FROM $usertable2 WHERE username = '$username';";
    			$resultEm = mysql_query($queryEm);

    			if($resultEm){
    				$row = mysql_fetch_array($resultEm);
    				$email = $row['email'];
    			}


            	$message = trim($message);
            	date_default_timezone_set('US/Eastern');
            	$time = date('Y/m/d H:i:s');


            	if(($message == 'Write your anonymous post here...')|| $message == ""){
            		?>
            		<script type="text/javascript">
            			window.location.href = document.referrer;
            		</script>
            		<?php
            	}
            	else
            	{


            	mysql_connect($host2Name, $usr2name, $pass) OR DIE ("Unable to
            	connect to database! Please try again later.");
            	mysql_select_db($db2name);
            	$message = mysql_real_escape_string($message);

            	$query = "INSERT INTO $user2table (message, time, username, ipman, postedby, img) VALUES ('$message', '$time', '$username', '$ipaddress', '$postedby', '$img');";
            	$result = mysql_query($query);

            	if($result){

            			$to = $email;
						$subject = "$postedby Posted on your Profile!";
						$message = "You have recieved a post from $postedby! \nVisit myprintf.com to view your post!\n\nMessage: $message";
						$from = "Talktome@myprintf.com";
						$headers = "From:" . $from;
						mail($to,$subject,$message,$headers);
						echo "Mail Sent.";

            	?>
            		<script type="text/javascript">
            			window.location.href = document.referrer;
            		</script>
            	<?php
            	}
            	else {
            	?>
            	<script type="text/javascript">
            			alert("please no Slashes...");
            			window.location.href = document.referrer;
            		</script>
            		<?php

            		}
            	}


?>
