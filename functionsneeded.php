<script src='js/jquery/jquery-1.10.2.min.js'></script>

<?php


/*$url = "mysql://b210a37bc0803d:b0f2505e@us-cdbr-east-04.cleardb.com/".
		"heroku_ed2de3a9c341196?reconnect=true";

$url = parse_url(getenv($url))

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"],1);

mysql_connect($server, $username, $password);

mysql_select_db($db);*/

$dbhost = 'localhost';
$dbname = 'docconnect';
$dbuser = 'root';
$dbpass = '';
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
    echo "<h2>$user</h3><br />";
    if (file_exists("profilePhotos/$user.jpg"))
    {
        echo "<img src = 'profilePhotos/$user.jpg' align = 'left' />";
    }

    $result = makeQuery("SELECT * FROM doctorProfiles WHERE username = '$user'");
	$userReviewTable = $user."Reviews";
   $resultReviews = makeQuery("SELECT * FROM $userReviewTable");
	 if (mysql_num_rows($result))
    {
        $row = mysql_fetch_row($result);
        echo stripslashes($row[1]) . "<br clear='left' /> <br/>".
			stripslashes($row[2]);
    }
	$numReviews = mysql_num_rows($resultReviews);
	echo "<h3>This Doctor's Reviews</h3><br />";
	while($numReviews > 0)
	{
		$reviewRow = mysql_fetch_assoc($resultReviews);
		echo $reviewRow['rating']."       ".$reviewRow['reviewText'];
		--$numReviews;
	}

}

?>
