<!DOCTYPE html>
<html lang='en'><head>
<meta name='author' content=''>
<meta charset='utf-8'>
<script type='text/javascript' src='https://cdn.firebase.com/v0/firebase.js'></script>
<script src='https://swww.tokbox.com/webrtc/v2.0/js/TB.min.js' type='text/javascript'></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
<link rel='stylesheet' type='text/css' href='styles.css' media='screen' />

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


if (isset($_POST['enteredUsername']))
{
    $enteredUsername = sanitizeString($_POST['enteredUsername']);
    $enteredPass = sanitizeString($_POST['enteredPass']);

    if($enteredUsername == "" || $enteredPass == "")
    {
        $error = "<span style='color:red'>Invalid Username or Password</span><br />";
    }
    else
    {
        $encryptedPass = sha1($enteredPass);
        $query = "SELECT username, password FROM members WHERE user='$enteredUsername' AND password='$encryptedPass'";
        $result = makeQuery($query);
        if(mysql_num_rows($result) == 0)
        {
            $error = "<span style = 'color:red'>Invalid Username or Password</span><br />";
        }
        else
        {
            $_SESSION['user'] = $enteredUsername;
            $_SESSION['pass'] = $enteredPass;
            header("Location: http://localhost/DocConnect/index.php");
            die("You are now logged in. Please <a href='members.php'?view=$enteredUsername>Click Here</a> To Continue");
        }
    }
}

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
	<h1><div class = 'appname'>$appname - $userstr</div></h1>
	</head><body><h1><div class = 'appname'>$appname - $userstr</div></h1>";



if (!$logInStatus)
{
	echo <<<_END
	<h2>Please Login to Access Page</h2><br />
	<form class = 'loginform' method = 'post' action = 'index.php'>$error
	<span class = 'fieldname'>Username</span>
	<input class = 'loginbox' type = 'text' maxlength = '16' name = 'enteredUsername' value = '$enteredUsername' /><br />
	<span class = 'fieldname'>Password</span>
	<input class = 'loginbox' type = 'password' maxlength = '16' name = 'enteredPass' value = '$enteredPass' /><br />
	<br />
	<span class = 'fieldname'></span>
	<input type = 'submit' value = 'Login' />
	</form><br /></div>
_END;
	die();
}

?>
