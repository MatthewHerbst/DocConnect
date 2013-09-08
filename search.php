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

$nameResult = makeQuery("SELECT * FROM members WHERE doctorStatus = 'TRUE' AND (firstname = '$searchRequest' OR lastname = '$searchRequest')");

$docInfoResult = makeQuery("SELECT * FROM doctors WHERE specialty = '$searchQuery' OR hopsital ='$searchQuery'");

$numNameRows = mysql_num_rows($nameResult);

$numInfoRows = mysql_num_rows($docInfoResult);

echo "<ul class='searchResults'>";
while($numNameRows > 0)
{
	$nameRow = mysql_fetch_assoc($nameResult);
	$userName = $nameRow['username'];
	echo "<li class='doctorListing'>Dr. ".$nameRow['firstname']." ".$nameRow['lastname'].
		" <a href = 'viewProfile?userToDisplay=$userName'>View Their Profile</a></li>";
	--$numNameRows;
}

while($numInfoRows > 0)
{
	$infoRow = mysql_fetch_assoc($docInfoResult);
	$userName = $infoRow['username'];
	$memberInfoResult = makeQuery("SELECT firstname, lastname FROM members WHERE username='$username'");
	$membersInfoRow = mysql_fetch_assoc($memberInfoResult);
	$firstname = $membersInfoRow['firstname'];
	$lastname = $membersInfoRow['lastname'];
	echo "<li class='doctorListing'>Dr. ".$firstname." ".$lastname.
		" <a href = 'viewProfile?userToDisplay=$userName'>View Their Profile</a></li>";
}

include_once 'footer.php';
?>
