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
	<link rel="icon" type="image/png" href="img/favicon.png">
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
   <div class='header' style='width:15%'><img src='img/logo.png' style='width:100%'></div>
   <div class='header' style='width:80%'>
     <ul class='nav nav-justified'>
       <li><a href='index.php'>Home</a></li>
       <li><a href='viewProfile.php?user=$user'>Profile</a></li>
       <li><a href='leaderboard.php'>Leaderboard</a></li>
       <li><a href='logout.php'>Logout?</a></li>
       <li><form style='background-color:#EDF1F2; border-color:#EDF1F2;' method = 'post' action = 'search.php'>
             <input id='search' type='text' placeholder='Press Enter to Search' style='width:200px;' name='search' class='form-control'></form></li>
     </ul>
   </div>";  
   ?>

</ul></div>
