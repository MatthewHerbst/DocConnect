<?php
include_once 'head.php';
include_once 'login.php';

if (isset($_GET['userToAdd']))
{
	$userToAdd = $_GET['userToAdd'];
}
else
{
	include_once 'head.php';
	die();
}

makeQuery("INSERT INTO favorites VALUES('$user', '$userToAdd')");

header("Location: viewProfile.php?userToDisplay=$userToAdd");

?>
