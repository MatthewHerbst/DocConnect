<?

session_start();
echo "<!DOCTYPE html><br /><html<head>";

include_once 'functionsneeded.php';


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



