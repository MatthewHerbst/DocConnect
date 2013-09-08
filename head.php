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
          <a class='navbar-brand' href='index.php'>MedConnect</a>
        </div>
        <div class='navbar-collapse collapse'>
          <ul class='nav navbar-nav'>
            <li class='active'><a href='index.php'>Home</a></li>";
			if($logInStatus) {
				echo "<li><a href='webcam.php'>Consult</a></li>";
			} else {
				echo "<li><a href='about.php'>About</a></li>";
            }
			echo
			"<li><a href='#'>Contact</a></li>";
			if($logInStatus) {
				echo "<li class='dropdown'>
					<a href='#' class='dropdown-toggle' data-toggle='dropdown'>My MedConnect<b class='caret'></b></a>
					<ul class='dropdown-menu'>
						<li><a href='#'>Manage Favorites</a></li>
						<li><a href='#'>View History</a></li>
						<li class='divider'></li>
						<li><a href='#'>Edit My Profile</a></li>
						<li><a href='#'>Settings</a></li>
					</ul>	
				</li>";
			}
			echo
          "</ul>
		  <!--<form method='post' action='search.php' width='75px'>
			<div class='form-group' width='75px'>
				  <input type='text' name='search' placeholder='Search MedConnect' class='form-control' width='75px'>
				  <button type='submit' class='btn btn-success'>Search</button>
			</div>
		  </form>-->";
            if(!$logInStatus) { //If they are not logged in, let them log in or register
				echo
				"<form class='navbar-form navbar-right' action='createAccount.php'>
					<button type='submit' class='btn btn-success'>Register</button>
				</form>
				<form class='navbar-form navbar-right' method='post' action='login.php'>
					<div class='form-group'>
						<input type='text' placeholder='Email' maxlength='16' name='enteredUsername' class='form-control'>
					</div>
					<div class='form-group'>
						<input type='password' placeholder='Password' maxlength='16' name='enteredPass' class='form-control'>
					</div>
					<button type='submit' class='btn btn-success'>Sign in</button>
				</form>";
			} else { //They are logged in, show them profile info
				echo
				"<form class='navbar-form navbar-right' action='logout.php'>
					<button type='submit' class='btn btn-success'>Log Out</button>
				</form>";
			}
			echo
          "</div><!--/.navbar-collapse -->
      </div>
    </div>";
?>
