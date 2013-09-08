<?php
include_once 'head.php';

if(isset($_POST['firstname']) && isset($_POST['lastname'])
	&& isset($_POST['username']) && isset($_POST['password'])
	&& isset($_POST['DOB']) && isset($_POST['doctorStatus'])
	&& isset($_POST['email']))
{	
	$firstName = $_POST['firstname'];
	$lastName = $_POST['lastname'];
	$userName = $_POST['username'];
	$passwordEntered = $_POST['password'];
	$DOB = $_POST['DOB'];
	$email = $_POST['email'];
	$doctorStatus = $_POST['doctorStatus'];
}
else
{
	echo "<div class = 'error'>There was an error when attempting to create your Account, please try again. <br />";
	include_once 'createAccount.php';
	die();
}


if($doctorStatus == 'yes')
{
	$doctorStatus = true;
}
else
{
	$doctorStatus = false;
}

if($doctorStatus)
{
	if(isset($_POST['education']) && isset($_POST['hospital'])
		&& isset($_POST['specialty']))
	{
		$education = $_POST['education'];
		$hospital = $_POST['hospital'];
		$specialty = $_POST['specialty'];
	}
	else
	{	
		echo "<div class = 'error'>There was an error when attempting to create your Account, please try again. <br /></div>";
		include_once 'createAccount.php';
		die();
	}
	
}

$passwordToSave = sha1($passwordEntered);

makeQuery("INSERT INTO members VALUES ('$userName', '$passwordToSave',
 '$firstName', '$lastName', '$DOB', '$email', '$doctorStatus')");


if ($doctorStatus)
{
	makeQuery("INSERT INTO doctors VALUES ('$userName', '$hospital', 
				'$specialty', '$education')");
	$nameReviewsTable = $userName."Reviews";
	createTable($nameReviewsTable, 'rating INT, reviewText VARCHAR(3000)');
}

echo "<h2>Congratulations, you have successfully created an account</h2>"

$_SESSION['user'] = $enteredUsername;
$_SESSION['pass'] = $enteredPass;
$logInStatus = TRUE;
header("Location: http://ec2-54-200-14-50.us-west-2.compute.amazonaws.com/DocConnect/index.php");
die("You are now logged in. Please <a href='index.php'>Click Here</a> To Continue");

?>

