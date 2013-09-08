<?php
include_once 'head.php'
include_once 'login.php';

$favoritesResult makeQuery("SELECT * FROM favorites WHERE username='$user'");

$numFavorites = mysql_num_rows($favoritesResult);


echo "<br /><h3>Your Favorites</h3><br />";
echo "<ul class='searchResults'>";

while ($numFavorites > 0)
{
	$favoritesRow = mysql_fetch_assoc($favoritesResult);
	$userName = $favoritesRow['username'];
	echo "<li class='doctorListing'>Dr. ".$nameRow['firstname']." ".$nameRow['lastname'].
        " <a href = 'viewProfile?userToDisplay=$userName'>View Their Profile</a></li>";
    --$numFavorites;
}




?>
