<?php
				session_start();
				$host2Name 	= "HOST NAME FOR COMMENT DATABASE";
        $usr2name 	= "USERNAME FOR POSTS DB";
        $db2name 		= "DB NAME FOR POSTS";
        $pass 			= "PASSWORD FOR DB";
        $usertable 	= "USERTABLE FOR POSTS/COMMENTS";


            	

				$usrname 		= "USERNAME FOR DATABASE";
				$pass 			= "PASSWORD TO DATABASE!";
				$hostname 	= "HOST NAME GOES HERE";
				$usertable 	= "USER TABLE HERE";
				$dbname 		= "DB NAME HERE";

				$username = $_SESSION['username'];
				$img = "";
				mysql_connect($hostname, $usrname, $pass2) OR DIE ("Unable to
    			connect to database! Please try again later.");
    			mysql_select_db($dbname);

    			$query = "SELECT * FROM $usertable2 WHERE username = '$username';";
    			$result = mysql_query($query);

    			if($result){
    				$row = mysql_fetch_array($result);

    				$img = $row['picture'];
    			}

            	$id = $_GET['id'];
            	$vorname = $_GET['username'];
            	$queryEm = "SELECT * FROM $usertable2 WHERE username = '$vorname';";
    			$resultEm = mysql_query($queryEm);

    			if($resultEm){
    				$row = mysql_fetch_array($resultEm);
    				$email = $row['email'];
    			}


            	$ipaddress = $_SERVER["REMOTE_ADDR"];
            	$comment = $_POST['comment'];
            	$comment = trim($comment);
            	date_default_timezone_set('US/Eastern');
            	$time = date('Y/m/d H:i:s');



            	if(($comment == 'comment...')|| $comment == ""){
            		echo $comment;
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
            	$comment = mysql_real_escape_string($comment);
            	$query = "INSERT INTO $usertable (id, comment, time, ipman, postedby, img) VALUES ('$id', '$comment', '$time', '$ipaddress', '$username', '$img');";
            	$result = mysql_query($query) or die(mysql_error());

            	if($result){
            			$to = $email;
						$subject = "$username commented on a Post!";
						$message = "You have recieved a post from $username! \nVisit myprintf.com to view your post!\n\nMessage: $comment";
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
            		echo "An error just happened.. Sorry...";
            		}
            	}
?>
