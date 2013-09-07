<!DOCTYPE html>
<html lang='en'><head>
<meta name='author' content=''>
<meta charset='utf-8'>
<script type='text/javascript' src='js/firebase/firebase.js'></script>
<script type='text/javascript' src='js/firebase/idle.js'></script>
<script type='text/javascript' src='js/tokbox/TB.min.js'></script>
<script type='text/javascript' src='js/jquery/jquery-1.10.2.min.js'></script>
<link rel='stylesheet' type='text/css' href='styles.css' media='screen' />

      <div class="masthead">
        <h3 class="text-muted">Project name</h3>
        <ul class="nav nav-justified">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Demo</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
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


echo "<title>$appname - $userstr</title>
	<link rel = 'stylesheet' href = 'styles.css' type = 'text/css' />
	</head><body>
	<img src='logo.png' height='100px'>
	<h1><div class = 'appname'>$appname - $userstr</div></h1>";


?>
