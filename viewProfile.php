<?
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

<h3>Have you worked with this doctor? Leave a Review</h3>
<form method = 'post' action = 'viewProfile.php?userToDisplay=$userToDisplay'
<span class='fieldname'>Rating(1-5)</span>
<select name = 'rating'>
<option value='0'>0</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
</select><br />
<textarea name='reviewText' cols='50' rows='4' placeholder='Enter Written Review here'>
</textarea>

<input type = 'submit' value = 'Submit Review' />



_END;

include_once 'footer.php'
?>


