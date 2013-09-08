<!DOCTYPE html>
<html lang='en'>
<head>
	<meta name='author' content=''>
	<meta charset='utf-8'>
	<script type='text/javascript' src='js/firebase/firebase.js'></script>
	<script type='text/javascript' src='js/firebase/idle.js'></script>
	<script type='text/javascript' src='js/tokbox/TB.min.js'></script>
	<script type='text/javascript' src='js/jquery/jquery-1.10.2.min.js'></script>
	<script type='text/javascript' src='js/bootstrap/bootstrap.min.js'></script>
	<link rel='stylesheet' href='styles/bootstrap/bootstrap.css' type='text/css'/>
	<!--<link rel='stylesheet' href='styles/styles.css' type='text/css'/>-->
	<link rel='icon' type='image/png' href='img/favicon.png'>
<?php
//Report all errors
ini_set('display_errors',1); 
error_reporting(E_ALL);

//Start the session
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
$user = 'Guest';

//Check to see if the user is logged-in
if(isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
	$logInStatus = TRUE;
	$userstr = "";
  
	//Count the user as being online (for Firebase)
	echo "<script type='text/javascript' src='js/onlineList.js'></script>";
  
	//Print the user as a globally accessible javascript variable
	echo "<script type='text/javascript'>var user = " . $_SESSION['user'] . ";</script>";
} else {
	$logInStatus = FALSE;
}

//Place the rest of the head and the start of the body
echo "<title>MedConnect - $userstr</title>
</head>
<body>";

/*
echo "
<body>
	<div class='header' style='width:15%'><img src='img/logo.png' style='width:100%'></div>
	<div class='header' style='width:80%'>
		<ul class='nav nav-justified'>
			<li><a href='index.php'>Home</a></li>";
			//Show option to view profile if logged in
			if($logInStatus) {
				echo "<li><a href='viewProfile.php?userToDisplay=$user'>Profile</a></li>";
			} else { //Otherwise show option to view the about page
				echo "<li><a href='about.php'>About</a></li>";
			}
			echo "<li><a href='leaderboard.php'>Leaderboard</a></li>
			<li><form style='background-color:#EDF1F2; border-color:#EDF1F2;' method = 'post' action = 'search.php'>
			<input id='search' type='text' placeholder='Press Enter to Search' style='width:200px;' name='search' class='form-control'></form></li>";
			if($logInStatus) {
				echo "<li><a href='logout.php'>Logout?</a></li>'";
			}
	echo "</ul></div>";
*/

//Fixed navbar
echo
    "<div class='navbar navbar-inverse navbar-fixed-top'>
      <div class='container'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='#'>Project name</a>
        </div>
        <div class='navbar-collapse collapse'>
          <ul class='nav navbar-nav'>
            <li class='active'><a href='#'>Home</a></li>
            <li><a href='#about'>About</a></li>
            <li><a href='#contact'>Contact</a></li>
            <li class='dropdown'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Dropdown <b class='caret'></b></a>
              <ul class='dropdown-menu'>
                <li><a href='#'>Action</a></li>
                <li><a href='#'>Another action</a></li>
                <li><a href='#'>Something else here</a></li>
                <li class='divider'></li>
                <li class='dropdown-header'>Nav header</li>
                <li><a href='#'>Separated link</a></li>
                <li><a href='#'>One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form class='navbar-form navbar-right'>
            <div class='form-group'>
              <input type='text' placeholder='Email' class='form-control'>
            </div>
            <div class='form-group'>
              <input type='password' placeholder='Password' class='form-control'>
            </div>
            <button type='submit' class='btn btn-success'>Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>";
	
	//The list of people who are online (is only populated if you are logged in)
	echo "<div id='onlineList'>"; if(!isset($_SESSION['user'])){ echo "Please log in to see who is online"; } echo "</div>";
?>