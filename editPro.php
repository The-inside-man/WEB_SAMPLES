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
<head>
<title>Talk To Me!</title>
<link href="special.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="colors.js"></script>
<script type="text/javascript">alert("Reminder! Make sure you select the correct Image for your profile!");</script>
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
<!--<input type="button" id="buttons" style="background-color:white" value="My Console" onMouseOver="changeButtColor(this);" onMouseOut="changeButtColor(this);" onclick="clicked(this);"/>-->
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
    	$email = $row['email'];
    	$school = $row['school'];
    	$program = $row['program'];
    	$city = $row['city'];
    	$language = $row['languages'];
    	$color = $row['color'];

    }
    else{
    	?>
    		<script type="text/javascript">
    			alert("You Must be logged in to view this page");
    			history.back();
    		</script>
    	<?php
    }


echo "<div id='newsFeed' align='center' >";
echo "<table id='profile_main' style='background-color:$color'>"?>
<tr>
<td id="propic"><?php echo "<img src='$img' alt='profile_picture' id='profilePic'/>" ?></td>
<td id="apps">

<table id="colors">
<tr><td id="square" style="background-color:#6ef" onclick="location.href='set_color.php?color=6ef';"></td>
<td id="square" style="background-color:#fbf" onclick="location.href='set_color.php?color=fbf';"></td>
<td id="square" style="background-color:#ffc" onclick="location.href='set_color.php?color=ffc';"></td></tr>
<tr><td id="square" style="background-color:#cfb" onclick="location.href='set_color.php?color=cfb';"></td>
<td id="square" style="background-color:#9ab" onclick="location.href='set_color.php?color=9ab';"></td>
<td id="square" style="background-color:#c0f" onclick="location.href='set_color.php?color=c0f';"></td></tr>
<tr><td id="square" style="background-color:#9ef" onclick="location.href='set_color.php?color=9ef';"></td>
<td id="square" style="background-color:#eee" onclick="location.href='set_color.php?color=eee';"></td>
<td id="square"><form id="hex" action="set_color_hex.php?" method="post">
<input type="text" name="color" id="color" placeholder="Hex Color" size="10"/><br>
<input type="submit" value="Set"/></form></td></tr>
</table>

</td>
</tr>
<tr>
<td colspan="2" id="userinfo">
<form action="editInfo.php" method="post" id="editing" name="editing" enctype="multipart/form-data">
<table><tr><td><?php echo "<b>Username : </b>". $_SESSION['username']; ?></td></tr>
<tr><td><?php echo "<b>Profile Picture :</b><select name='proPic'>
												<option value='cat1.png'>Cat1<option>
												<option value='cat2.png'>Cat2<option>
												<option value='cat3.gif'>Cat3<option>
												<option value='cat1.gif'>Cat4<option>
												<option value='cat3.png'>Cat5<option>
												<option value='ninja.gif'>Ninja<option>
												<option value='alien.gif'>Alien<option>
												<option value='princess.gif'>Princess<option>
												<option value='soldier.gif'>Soldier<option>
												<option value='nerdm.gif'>Nerd_Male<option>
												<option value='nerdf.gif'>Nerd_Female<option>
											</select>"; ?></td></tr>
<tr><td><?php echo "<b>Contact Info :</b><input name='email' type='text' value='$email' size='55'/>"; ?></td></tr>
<tr><td><?php echo "<b>Education Institute :<input name='school' type='text' value='$school'/><b>Program of study :</b><input name='program' type='text' value='$program'/>"; ?></td></tr>
<tr><td><?php echo "<b>Current City :</b><input name='city' type='text' value='$city'/>"; ?></td></tr>
<tr><td><?php echo "<b>Spoken Languages :</b><input name='languages' type='text' value='$language'/>"; ?></td>
<td><input type="submit" id="ebutts" value="Set Changes" style="background-color:white" onMouseOver="changeButtColor(this);" onMouseOut="changeButtColor(this);"/></td></tr>
</table>
</form>

</td>
</tr>
<tr>
<td colspan="2" id="post">
</td>
</tr>
<tr>
<td colspan="2" id="posts">
</td>
</tr>
</table
</div>
<div id="bottomBanner" align="center">
<p id="bottomText">
<br><br>
MyPrintF(c) 2013<br>By: YellowBudInc/JakeBrown/brain/mind/imagination/Lim+Infinity
</p>
</div>
</body>
</html>
