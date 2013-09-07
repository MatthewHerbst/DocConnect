<!DOCTYPE html>
<html lang='en'><head>
<meta name='author' content=''>
<meta charset='utf-8'>
<script type='text/javascript' src='js/firebase/firebase.js'></script>
<script type='text/javascript' src='js/firebase/idle.js'></script>
<script type='text/javascript' src='js/tokbox/TB.min.js'></script>
<script type='text/javascript' src='js/jquery/jquery-1.10.2.min.js'></script>

<?php
session_start();

//db and other functions
require_once 'functionsneeded.php';

//tokbox SDK
require_once 'tokbox/Opentok-PHP-SDK/OpenTokSDK.php';
require_once 'tokbox/Opentok-PHP-SDK/OpenTokArchive.php';
require_once 'tokbox/Opentok-PHP-SDK/OpenTokSession.php';

//For video communication
require_once 'tok.php';



$userstr = 'Guest';

if(isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
	$logInStatus = TRUE;
	$userstr = "";
} else 
{
	$logInStatus = FALSE;
}


echo "<title>MedConnect - $userstr</title>
	<link rel = 'stylesheet' href = 'styles.css' type = 'text/css' />
	</head><body>
	<div id='header'><img src='logo.png' height='100px'>
<div style='padding:5px'>
          <form class='form-group' align=right' class='masthead' name='search' action='search.php' method='get'>
	      Search: <input type='text' name='fields'>
	      <input type='submit' value='Submit'></form></a></div></div>
      <div class='masthead'>
        <ul class='nav nav-justified'>
          <li class='active'><a href='index.php'>Home</a></li>
          <li><a href='about.php'>About</a></li>
          <li><a href='leaderboard.php'>Leaderboard</a></li>
          <li><a href='contact.php'>Contact</a></li>
	  <li><a href='logout.php'>You are logged in as $userstr. Logout?</a></li>
        </ul>
      </div>";
?>
