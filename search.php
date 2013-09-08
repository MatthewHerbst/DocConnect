<?php

include_once 'head.php';
include_once 'login.php';

if (isset($_POST['search']))
{
	$searchRequest = $_POST['search'];
}
else
{
	include_once 'index.php';
	die();
}

echo "<h2>Search Results</h2>";

makeQuery("SELECT * FROM members ")


?>
