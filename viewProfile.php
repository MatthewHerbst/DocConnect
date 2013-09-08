<?php
include_once 'head.php';
include_once 'login.php';


if(isset($_POST['reviewText']) && $_POST['rating'])
{
	$reviewsTableName = $user."Reviews";
	$reviewText = $_POST['reviewText'];
	$rating = $_POST['rating'];
	makeQuery("INSERT INTO $reviewsTableName VALUES('$rating', '$reviewText')");
	header("location:'viewProfile.php'");
}
if(isset($_GET['userToDisplay']))
{
	$userToDisplay = $_GET['userToDisplay']; 
}


showProfile($userToDisplay);

echo <<<_END

<h3>Have you worked with this doctor? Leave a Review!</h3>
<form method = 'post' action = 'viewProfile.php?userToDisplay=$userToDisplay'>
<span style='font-size:1.4em'>Rating: Low </span>
<input type="radio" name = 'rating' value="1">&nbsp&nbsp1&nbsp</input>
<input type="radio" name = 'rating' value="2">&nbsp&nbsp2&nbsp</input>
<input type="radio" name = 'rating' value="3">&nbsp&nbsp3&nbsp</input>
<input type="radio" name = 'rating' value="4">&nbsp&nbsp4&nbsp</input>
<input type="radio" name = 'rating' value="5">&nbsp&nbsp5&nbsp</input>
<span style='font-size:1.4em'> High</span>
<br /><br />
<textarea name='reviewText' cols='50' rows='4' placeholder='Enter Written Review here'>
</textarea>

<input class='btn btn-success' type = 'submit' value = 'Submit Review' />



_END;

include_once 'footer.php'
?>


