<script src='js/jquery/jquery-1.10.2.min.js'></script>

<?php

$dbhost = 'localhost';
$dbname = 'docconnect';
$dbuser = 'root';
$dbpass = 'medconnect';
$appname = "Doc Connect";

mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());

mysql_select_db($dbname) or die(mysql_error());


echo "<link href='styles.css' rel='stylesheet' type='text/css'>";

function createTable($name, $query)
{
    makeQuery("CREATE TABLE IF NOT EXISTS $name($query)");
}

//TODO: this is insecure - write methods for stuff in future
function makeQuery($query)
{
    $result = mysql_query($query) or die(mysql_error());
	return $result;
}

function destroySession()
{
    $_SESSION = array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
    {
        setcookie(session_name(), '', time()-2592000, '/');
    }

    session_destroy();
}

function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return mysql_real_escape_string($var);
}

function showProfile($user)
{
    echo "<h2>$user</h2>";
    if (file_exists("profilePhotos/$user.jpg"))
    {
        echo "<img style='border-radius:2px; border-radius:2px;' src = 'profilePhotos/$user.jpg' align = 'left' />";
    }

    $result = makeQuery("SELECT * FROM doctorProfiles WHERE username = '$user'");
   $resultReviews = makeQuery("SELECT * FROM reviews WHERE username = '$user'");
	 if (mysql_num_rows($result))
    {
        $row = mysql_fetch_row($result);
        echo stripslashes($row[1]) . "<br clear='left' /> <br/>".
			"My Rating is: ".stripslashes($row[2]);
    }
	$numReviews = mysql_num_rows($resultReviews);
	$numReviewsStart = $numReviews;
	echo "<h3>This Doctor's Reviews</h3><br />";
	if ($numReviews > 0)
	{
		echo "<table class='userReviews' cellspacing='20'><tr><th>Rating</th><th>Review
		</th></tr>";	
	}
	else
	{
		echo "<span style='font-size:1.4em;'>There are currently no reviews, Be the first to write one, below.
                </span>";
	}
	while($numReviews > 0)
	{
		$reviewRow = mysql_fetch_assoc($resultReviews);
		echo "<tr><td>".$reviewRow['rating']."</td><td>".$reviewRow['reviewText']."</td></tr>";
		--$numReviews;
	}
	if($numReviewsStart > 0)
	{
		echo "</table>";
	}

}

?>
