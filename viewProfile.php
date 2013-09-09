<?php
include_once 'head.php';
include_once 'login.php';

if(isset($_GET['userToDisplay']))
{
    $userToDisplay = $_GET['userToDisplay'];
}

if(isset($_POST['reviewText']) && $_POST['rating'])
{
	$reviewText = $_POST['reviewText'];
	$rating = $_POST['rating'];
	makeQuery("INSERT INTO reviews VALUES('$userToDisplay', '$rating', '$reviewText')");
	header("location: viewProfile.php?userToDisplay=$userToDisplay");
}


showProfile($userToDisplay);

if($userToDisplay != $user)
{
	$favoritesQuery = "SELECT * FROM favorites WHERE username='$user'".
					" AND favoritedUser='$userToDisplay'";
	$favoritesResult = makeQuery($favoritesQuery);
	if(mysql_num_rows($favoritesResult))
	{
		echo "<br /><h3>This User is Currently in Your Favorites</h3>";
	}
	else
	{
		echo "<h3><a href='addToFavorites.php?userToAdd=$userToDisplay'>
		Add this Doctor to your Favorites</a></h3><br />";	
	}	
}

if($userToDisplay != $user)
{
echo <<<_END
<div class='sixty' align='center'>
<h3><a href='addToFavorites?userToAdd=$userToDisplay'>
Add this Doctor to your Favorites</a></h3><br />
<h3>Have you worked with this doctor? Leave a Review!</h3>
<div style='width:40%;'>
<form method = 'post' action = 'viewProfile.php?userToDisplay=$userToDisplay'>
<span style='font-size:1.4em'>Rating: Low </span>
<input type="radio" name = 'rating' value="1">&nbsp&nbsp1&nbsp</input>
<input type="radio" name = 'rating' value="2">&nbsp&nbsp2&nbsp</input>
<input type="radio" name = 'rating' value="3">&nbsp&nbsp3&nbsp</input>
<input type="radio" name = 'rating' value="4">&nbsp&nbsp4&nbsp</input>
<input type="radio" name = 'rating' value="5">&nbsp&nbsp5&nbsp</input>
<span style='font-size:1.4em'> High</span>
<br /><br />
<textarea name='reviewText' cols='50' rows='4' placeholder='Enter Written Review Here'>
</textarea>
<BR><BR>
<input class='btn btn-success' type = 'submit' value = 'Submit Review' />
</div></div>


_END;

}
else
{
	echo "<h3>This is your profile, to edit, click ".
		"<a href='editProfile.php'>here</a></h3>"; 
}
include_once 'footer.php';

?>


