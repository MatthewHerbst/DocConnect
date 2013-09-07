<!DOCTYPE html>
<html lang='en'><head>
<meta name='author' content=''>
<meta charset='utf-8'>
<script type='text/javascript' src='https://cdn.firebase.com/v0/firebase.js'></script>
<script src='http://static.opentok.com/webrtc/v2.0/js/TB.min.js'></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>

<?php

session_start();

include_once 'functionsneeded.php';

require_once 'tokbox/Opentok-PHP-SDK/OpenTokSDK.php';
require_once 'tokbox/Opentok-PHP-SDK/OpenTokArchive.php';
require_once 'tokbox/Opentok-PHP-SDK/OpenTokSession.php';

$userstr = 'Guest';

if (isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
	$logInStatus = TRUE;
	$userstr = "";
}

else
{
	$logInStatus = FALSE;
}

echo "<title>$appname - $userstr</title>
	<link rel = 'stylesheet' href = 'styles.css' type = 'text/css' />
	</head><body><h1><div class = 'appname'>$appname - $userstr</div></h1>";

?>