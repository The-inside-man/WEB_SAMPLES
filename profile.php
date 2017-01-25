////////////////////////////////
// SAMPLE PROFILE PAGE IN PHP //
// 														//
// Written By: Jake Brown     //
//                            //
////////////////////////////////

<?php
	session_start();
	if(!isset($_SESSION['username'])){
		?>
    		<script type="text/javascript">
    			alert("You Must be logged in to view this page");
    			history.back();
    		</script>
    	<?php
	}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html;" />
<title>
<?php
	echo $_SESSION['username'];
?></title>
<link href="special.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="colors.js"></script>
</head>
<body id="printFbodyIndex" onload="checkCookie();">
<table id="topBanner" cellpadding="0" cellspacing="0"><tr><td><img src="images/YellowBud.png" alt="Uh Oh... something isn't right :S" id="icon2"/></td>
<td align="right"><form id="logout" action="logout.php" method="post"><label for="logout" style="color:white">Logout :</label>
<input name="logoutbutt" id="logoutbutt" type="submit" size="25" value="Logout"/></form></td><td align="right">
<input type="button" value="Go"/><input type="text" placeholder="Search MyPrintF here..." size="50"/></td><td>-</td></tr></table>
<table id="menu" cellpadding="0" cellspacing="0"><tr><td></td><td>
<center>
<input type="button" id="buttons" style="background-color:white" value="Home" onMouseOver="changeButtColor(this);" onMouseOut="changeButtColor(this);" onclick="clicked(this);location.href='profile.php';"/>
<input type="button" id="buttons" style="background-color:white" value="About" onMouseOver="changeButtColor(this);" onMouseOut="changeButtColor(this);" onclick="clicked(this);location.href='about.php';"/>
<input type="button" id="buttons" style="background-color:white" value="People" onMouseOver="changeButtColor(this);" onMouseOut="changeButtColor(this);" onclick="clicked(this);location.href='people.php';"/>
<input type="button" id="buttons" name="current" style="background-color:#cf7" value="My Profile" onMouseOver="changeButtColor(this);" onMouseOut="changeButtColor(this);" onclick="clicked(this);location.href='profile.php';"/>
</center>
</td></tr></table>
<?php
	$usrname = "USERNAME FOR DATABASE";
	$pass = "PASSWORD TO DATABASE!";
	$hostname = "HOST NAME GOES HERE";
	$usertable = "USER TABLE HERE";
	$dbname = "DB NAME HERE";

	$username = $_SESSION['username'];
	$img = "";
	mysql_connect($hostname, $usrname, $pass) OR DIE ("Unable to
    connect to database! Please try again later.");
    mysql_select_db($dbname);

    $query = "SELECT * FROM $usertable WHERE username = '$username';";
    $result = mysql_query($query);

    if($result){
    	$row = mysql_fetch_array($result);

    	$img = $row['picture'];
    	$rate = $row['rate'];
    	$school = $row['school'];
    	$program = $row['program'];
    	$city = $row['city'];
    	$language = $row['languages'];
    	$special = $row['spec'];
    	$bkImg = $row['bkImg'];

    }
    else{
    	?>
    		<script type="text/javascript">
    			alert("You Must be logged in to view this page");
    			history.back();
    		</script>
    	<?php
    }


echo "<div id='newsFeed' align='center'>";
echo "<table id='profile_main' style='background-color:$color;'>"?>
<tr>
<td id="propic">
	<?php echo"<table border='0' background='backgrounds/bkgImg.jpg' style='height:250px;width:800px;background-size:100%;'>";?><tr>
	<td style="width:350px;"><table border="0"><td></td><td rowspan="2"><?php echo "<img src='$img' alt='profile_picture' id='profilePic'/>" ?></td><tr><td colspan="2">


	<form enctype="multipart/form-data" id="pofilia" action="upload.php" method="post">
	<img src="images/camera.png" align="right" style="width:50px;position:relative;z-index:10;" id="upLoad" onmouseover="this.style.width='55px';" onmouseout="this.style.width='50px';" onclick="">
	<input type="file" name="file" id="file" style="visibility:hidden" onchange="this.form.submit();"/></form>


	</td></tr></table></td>
	<td>
	<h1><?php echo $_SESSION['username']; ?></h1>
	</td></tr></table> <!-- I LOVE INLINE JAVASCRIPT!!!!-->
</td>
</tr>
<tr>
<td colspan="2" id="userinfo">
<table border="0" style="width:;height:30px;">
<td>
	<input type="button" id="tabs" style="background-color:white;font-size:18pt;" value="Studies" onMouseOver="changeButtColor(this);" onMouseOut="changeButtColor(this);"
	onclick="clicked(this);
	studiesSec.style.visibility='visible';
	feedbackSec.style.visibility='hidden';
	posts.style.visibility='hidden';
    feed.style.height='0px';
    theWorks.style.height='200px';
	infoSec.style.visibility='hidden';
	projectsSec.style.visibility='hidden'"/>
</td>
<td>
	<input type="button" id="tabs" style="background-color:white;font-size:18pt;" value="Feedback" onMouseOver="changeButtColor(this);" onMouseOut="changeButtColor(this);"
	onclick="clicked(this);
	studiesSec.style.visibility='hidden';
	feedbackSec.style.visibility='visible';
	feed.style.height = posts.style.height;
	theWorks.style.height='0px';
	posts.style.visibility='visible';
	infoSec.style.visibility='hidden';
	projectsSec.style.visibility='hidden'"/>
</td>
<td>
	<input type="button" id="tabs" style="background-color:white;font-size:18pt;" value="Info" onMouseOver="changeButtColor(this);" onMouseOut="changeButtColor(this);"
	onclick="clicked(this);
	studiesSec.style.visibility='hidden';
	feedbackSec.style.visibility='hidden';
	posts.style.visibility='hidden';
	feed.style.height='0px';
	theWorks.style.height='200px';
	infoSec.style.visibility='visible';
	projectsSec.style.visibility='hidden'"/>
</td>
<td>
	<input type="button" id="tabs" style="background-color:white;font-size:18pt;" value="Projects" onMouseOver="changeButtColor(this);" onMouseOut="changeButtColor(this);"
	onclick="clicked(this);
	studiesSec.style.visibility='hidden';
	feedbackSec.style.visibility='hidden';
	posts.style.visibility='hidden';
	feed.style.height='0px';
	theWorks.style.height='200px';
	infoSec.style.visibility='hidden';
	projectsSec.style.visibility='visible'"/>
</td>
</table>
<div id="theWorks" style="padding:10px;">
	<table id="studiesSec" style="position:absolute;visibility:visible;">
		<tr>
			<td>
				<table>
					<tr>
						<td>
							<b>Institution:</b> <b style="color:blue;"><?php echo $school; ?></b>
						</td>
					</tr>
					<tr>
						<td>
							<b>Program of study:</b> <b style="color:blue;"><?php echo $program; ?></b>
						</td>
					</tr>
					<tr>
						<td>
							<b>Specialties:</b> <b style="color:blue;"><?php echo $special; ?></b>
						</td>
					</tr>
					<tr>
						<td>
							<b>References:</b> click to request <button>Request References</button>
						</td>
					</tr>
					<tr>
						<td>
							<b>Hourly Rate:</b> <b style="color:blue;">$<?php echo $rate; ?>.00</b>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<table id="feedbackSec" style="position:absolute;visibility:hidden;">
		<tr>
			<td>


				<!-- script to display feedback messages here -->



			</td>
		</tr>
	</table>
	<table id="infoSec" style="position:absolute;visibility:hidden;">
		<tr>
			<td>
							<table>
								<tr>
									<td>
										<b>Name:</b> <b style="color:blue;"><?php echo $username; ?></b>
									</td>
								</tr>
								<tr>
									<td>
										<b>City:</b> <b style="color:blue;"><?php echo $city; ?></b>
									</td>
								</tr>
								<tr>
									<td>
										<b>Spoken Languages:</b> <b style="color:blue;"><?php echo $language; ?></b>
									</td>
								</tr>
								<tr>
									<td>
										<b>Education History:</b> <b style="color:blue;"></b>
									</td>
								</tr>
							</table>
			</td>
		</tr>
	</table>
	<table id="projectsSec" style="position:absolute;visibility:hidden;">
		<tr>
			<td>
				<b>My Projects</b>
			</td>
		</tr>
	</table>
</div>
<div id="feed">
<table id="posts" style="visibility:hidden;"><tr><td>
<center>
<?php

            	$host2Name 	= "HOST NAME FOR COMMENT DATABASE";
		$usr2name 	= "USERNAME FOR POSTS DB";
		$db2name 	= "DB NAME FOR POSTS";
		$pass 		= "PASSWORD FOR DB";
		$usertable 	= "USERTABLE FOR POSTS/COMMENTS";

            	$username = $_SESSION['username'];

            	mysql_connect($host2Name, $usr2name, $pass) OR DIE ("Unable to
            	connect to database! Please try again later.");
            	mysql_select_db($db2name);

            	$query = "SELECT * FROM $user2table WHERE username = '$username' ORDER BY time DESC;";
            	$result = mysql_query($query);


            	if ($result) {
            		$num = 0;
                while($row = mysql_fetch_array($result)) {
                    $message = $row["message"];
                    $time = $row["time"];
                    $id = $row["id"];
                    $username = $row["username"];
                    $img1 = $row["img"];
                    $postedby = $row["postedby"];
                    $message = urldecode(stripslashes($message));

                    if($num%2==0){
                    	$color = "#cf7";
                    	$back = "white";
                    }
                    else{
                    	$color = "#cf7";
                    	$back = "white";
                    }

                    echo "<table style='border-bottom: 3px solid $color;border-radius:15px;width:620px;color:black;background-color:$back;'><tr><td>";
                    echo "<center><p style='background-color:grey;'> Time posted : $time ------- Posted By: <b style='color:#cf7;'>$postedby</b><br></p></center></br>";
					echo "<img src='$img1' style='width:50px;height:50px;'/>$postedby says : $message </br></br>";
					echo " <hr>";

					$usertable = "comments";
            		$comm = "SELECT * FROM $usertable WHERE id = '$id' ORDER BY time ASC;";
            		$results = mysql_query($comm);

            		while($rows = mysql_fetch_array($results)) {

            			$comment = $rows["comment"];
            			$times = $rows["time"];
            			$user = $rows["postedby"];
            			$userImg = $rows["img"];

            			echo "$times</br>";
            			echo "<b style='color:#777;'><img src='$userImg' style='width:50px;height:50px;'/><b style='color:#6ad'>$user</b> says: $comment</b></br>";
            			echo "<hr>";

            		}

                    echo "<form action='comment.php?id=$id&username=$user' method='post' id='comment' name='comment'>";
                    echo "		</br><textarea style='resize:none;' name='comment' id='comment' cols='45' rows='1' placeholder='Comment here...'></textarea>
                    		<input type='submit' value='comment' id='comments' name='comments'/>";
                    echo"		</form>";
                    echo "</td></tr></table><br><br>";


                    $num += 1;
                }
            	}
      			 mysql_close();
    			?>
</center>
</td></tr></table>
</div>
<div id="bottomBanner" align="center">
<p id="bottomText">
<br><br>
MyPrintF(c) 2014/2015
</p>
</div>
</body>
<script type="text/javascript">
	var tf = document.getElementById('file');

	var up = document.getElementById('upLoad').onclick = function (){tf.click();};

</script>
</html>
