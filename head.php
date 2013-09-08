<!DOCTYPE html>
<html lang='en'>
<head>
	<meta name='author' content=''>
	<meta charset='utf-8'>
	<script type='text/javascript' src='js/firebase/firebase.js'></script>
	<script type='text/javascript' src='js/firebase/idle.js'></script>
	<script type='text/javascript' src='js/tokbox/TB.min.js'></script>
	<script type='text/javascript' src='js/jquery/jquery-1.10.2.min.js'></script>
	<link rel='stylesheet' href='styles/bootstrap/bootstrap.css' type='text/css'/>
	<link rel='stylesheet' href='styles/styles.css' type='text/css'/>
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
	</head><body>
	<div id='header'><img src='img/logo.png' height='100px'>
          <form method = 'post' action = 'search.php' 
			class='navbar-form navbar-right'>
            <div class='form-group'>
              <input type='text' placeholder='Search' name='search' class='form-control'>
            </div>
            <button type='submit' class='btn btn-success'>Search</button>
          </form>
</div>

      <div class='masthead'>
        <ul class='nav nav-justified'>
          <li class='active'><a href='index.php'>Home</a></li>
          <li><a href='editProfile.php'>Edit Profile</a></li>
          <li><a href='leaderboard.php'>Leaderboard</a></li>";
	if($logInStatus)
	{
		echo "<li><a href='viewProfile.php?user=$user'>View Your Profile</a></li>
				<li style='font-size: 1em;'>
				<a href='logout.php'>Logout?</a></li>";
	}  
?>

</ul></div>
