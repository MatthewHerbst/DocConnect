<script src='js/jquery/jquery-1.10.2.min.js'></script>

<?php


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

    $result = makeQuery("SELECT * FROM profiles WHERE user = '$user'");

    if (mysql_num_rows($result))
    {
        $row = mysql_fetch_row($result);
        echo stripslashes($row[1]) . "<br clear='left' /> <br/>";
    }

}

?>
