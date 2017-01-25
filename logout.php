<?php
	session_start();
	$_SESSION['username'] ="";
	$_SESSION['passwprd'] = "";
	session_destroy();
	header("Location: index.html");
?>