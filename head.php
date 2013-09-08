<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta name='description' content=''>
	<meta name='author' content=''>
	<script type='text/javascript' src='js/firebase/firebase.js'></script>
	<script type='text/javascript' src='js/firebase/idle.js'></script>
	<script type='text/javascript' src='js/tokbox/TB.min.js'></script>
	<script type='text/javascript' src='js/jquery/jquery-1.10.2.min.js'></script>
	<script type='text/javascript' src='js/bootstrap/bootstrap.min.js'></script>
	<script type='text/javascript' src='js/bootstrap/offcanvas.js'></script>
	<link rel='stylesheet' href='styles/bootstrap/bootstrap.css' type='text/css'/>
	<link rel='stylesheet' href='styles/bootstrap/jumbotron.css' type='text/css'>
	<link rel='stylesheet' href='styles/bootstrap/offcanvas.css' type='text/css'>
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
          <a class='navbar-brand' href='#'>MedConnect</a>
        </div>
        <div class='navbar-collapse collapse'>
          <ul class='nav navbar-nav'>
            <li class='active'><a href='#'>Home</a></li>";
			if($logInStatus) {
				echo "<li><a href='#about'>Consult</a></li>";
			} else {
				echo "<li><a href='#about'>About</a></li>";
            }
			echo
			"<li><a href='#contact'>Contact</a></li>
          </ul>
		  <form method='post' action='search.php'>
			<div class='form-group'>
				  <input type='text' name='search' placeholder='Search MedConnect' class='form-control'>
				  <button type='submit' class='btn btn-success'>Search</button>
			</div>
		  </form>";
            if(!$logInStatus) { //If they are not logged in, let them log in
				echo
				"<form class='navbar-form navbar-right'>
					<div class='form-group'>
						<input type='text' placeholder='Email' class='form-control'>
					</div>
					<div class='form-group'>
						<input type='password' placeholder='Password' class='form-control'>
					</div>
					<button type='submit' class='btn btn-success'>Sign in</button>
				</form>";
			} else { //They are logged in, show them profile info
				echo
				"<li class='dropdown'>
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
				<form class='navbar-form navbar-right' action='logout.php'>
					<button type='submit' class='btn btn-success'>Log Out</button>
				</form>";
			}
			echo
          "</div><!--/.navbar-collapse -->
      </div>
    </div>";
?>